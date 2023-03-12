<?php

namespace IndieSystems\AdminLteUiComponents\Components\Forms;

use Illuminate\View\Component;

class Create extends Component
{

    public $fields;

    public $resource;

    public $method = 'POST';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fields, $resource, $method = 'POST')
    {
        $this->fields   = $fields;
        $this->resource = $resource;
        $this->method   = $method;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('AdminLteUiComponentsView::components.forms.create');
    }
}
