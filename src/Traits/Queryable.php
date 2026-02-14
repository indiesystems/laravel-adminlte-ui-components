<?php

namespace IndieSystems\AdminLteUiComponents\Traits;

use Illuminate\Database\Eloquent\Builder;

/**
 * Adds sorting and searching to controller index methods.
 *
 * Usage:
 *   use Queryable;
 *
 *   protected array $sortable = ['name', 'amount', 'created_at'];
 *   protected array $searchable = ['name', 'email'];
 *   protected string $defaultSort = 'created_at';
 *   protected string $defaultDir = 'desc';
 *
 *   public function index() {
 *       return view('costs.index', [
 *           'collection' => $this->filterQuery(Cost::query())->paginate(),
 *           'sortable' => $this->sortable,
 *       ]);
 *   }
 */
trait Queryable
{
    /**
     * Apply sorting and searching to a query builder.
     */
    protected function filterQuery(Builder $query): Builder
    {
        return $this->applySearch($this->applySort($query));
    }

    /**
     * Apply sorting from request params (sort, dir).
     */
    protected function applySort(Builder $query): Builder
    {
        $sortable = property_exists($this, 'sortable') ? $this->sortable : [];
        $defaultSort = property_exists($this, 'defaultSort') ? $this->defaultSort : null;
        $defaultDir = property_exists($this, 'defaultDir') ? $this->defaultDir : 'asc';

        $sort = request('sort');
        $dir = request('dir', 'asc');

        // Validate direction
        $dir = in_array(strtolower($dir), ['asc', 'desc']) ? strtolower($dir) : 'asc';

        // Apply requested sort if field is in the whitelist
        if ($sort && in_array($sort, $sortable)) {
            return $query->orderBy($sort, $dir);
        }

        // Apply default sort if set
        if ($defaultSort) {
            return $query->orderBy($defaultSort, $defaultDir);
        }

        return $query;
    }

    /**
     * Apply search from request param (search).
     */
    protected function applySearch(Builder $query): Builder
    {
        $searchable = property_exists($this, 'searchable') ? $this->searchable : [];
        $search = request('search');

        if (empty($search) || empty($searchable)) {
            return $query;
        }

        return $query->where(function (Builder $q) use ($searchable, $search) {
            foreach ($searchable as $field) {
                $q->orWhere($field, 'like', "%{$search}%");
            }
        });
    }
}
