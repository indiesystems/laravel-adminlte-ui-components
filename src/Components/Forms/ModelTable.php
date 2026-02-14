<?php

namespace IndieSystems\AdminLteUiComponents\Components\Forms;

use Illuminate\View\Component;

class ModelTable extends Component
{
    public $resource;
    public $headers;
    public $fields;
    public $collection;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($resource, $headers, $fields, $collection, $sortable = [])
    {
        $this->resource   = $resource;
        $this->headers    = $headers;
        $this->fields     = $fields;
        $this->collection = $collection;
        $this->sortable   = $sortable;

        $currentSort = request('sort', '');
        $currentDir  = request('dir', 'asc');

        $this->sortUrls = [];
        $this->sortIcons = [];

        foreach ($sortable as $field) {
            $dir = ($currentSort === $field && $currentDir === 'asc') ? 'desc' : 'asc';
            $this->sortUrls[$field] = request()->fullUrlWithQuery(['sort' => $field, 'dir' => $dir]);
            $this->sortIcons[$field] = $currentSort !== $field
                ? 'fas fa-sort text-muted'
                : ($currentDir === 'asc' ? 'fas fa-sort-up' : 'fas fa-sort-down');
        }
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('AdminLteUiComponentsView::components.forms.modeltable');
    }
}
