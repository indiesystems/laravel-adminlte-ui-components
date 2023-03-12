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
    public function __construct($resource, $headers, $fields, $collection)
    {
        $this->resource   = $resource;
        $this->headers    = $headers;
        $this->fields     = $fields;
        $this->collection = $collection;
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
