<?php

namespace IndieSystems\AdminLteUiComponents\Components\Forms;

use Illuminate\View\Component;

class Edit extends Component
{

    public $fields;

    public $resource;

    public $model;

    public $method = 'PUT';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fields, $resource, $model, $method = 'PUT')
    {
        $this->fields   = $fields;
        $this->resource = $resource;
        $this->model    = $model;
        $this->method   = $method;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('AdminLteUiComponentsView::components.forms.edit');
    }
}
