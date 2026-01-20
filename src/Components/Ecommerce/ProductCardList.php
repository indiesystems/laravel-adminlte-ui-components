<?php

namespace IndieSystems\AdminLteUiComponents\Components\Ecommerce;

use Illuminate\View\Component;

class ProductCardList extends Component
{
    /** @var array<int,array<string,mixed>> */
    public array $products;

    /** @var int|array<string,int> */
    public $cols;

    public string $layout;   // default variant for all items: card|tile|horizontal
    public string $gapClass; // spacing class between cards (e.g. mb-4)

    /**
     * @param array<int,array<string,mixed>> $products
     * @param int|array<string,int>          $cols  e.g. 3 OR ['sm'=>2,'md'=>3,'lg'=>4]
     */
    public function __construct(array $products, $cols = 3, string $layout = 'card', string $gapClass = 'mb-4')
    {
        $this->products = $products;
        $this->cols     = $cols;
        $this->layout   = $layout;
        $this->gapClass = $gapClass;
    }

    /** Build bootstrap col classes based on cols config */
    public function colClasses(): string
    {
        // helper to map "N columns" -> "col-*-{12/N}"
        $toSpan = function (int $n): int {
            $n = max(1, min($n, 12));
            return (int) floor(12 / $n) ?: 12;
        };

        // default full width on xs
        $classes = ['col-12'];

        if (is_int($this->cols)) {
            $classes[] = 'col-md-' . $toSpan($this->cols);
        } elseif (is_array($this->cols)) {
            foreach ($this->cols as $bp => $n) {
                $span = $toSpan((int) $n);
                // normalize breakpoint names to bootstrap ones
                $bp = in_array($bp, ['sm','md','lg','xl','xxl'], true) ? $bp : 'md';
                $classes[] = "col-{$bp}-{$span}";
            }
        } else {
            $classes[] = 'col-md-4'; // safe fallback: 3 columns
        }

        return implode(' ', array_unique($classes));
    }

    public function render()
    {
        return view('AdminLteUiComponentsView::components.ecommerce.product-card-list');
    }
}
