<?php

namespace IndieSystems\AdminLteUiComponents\Components\Pages;

use Illuminate\View\Component;

class ShowCard extends Component
{

    public $header;

    public $fields;

    public $resource;

    public $model;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($header, $fields, $resource, $model)
    {
        $this->header   = $header;
        $this->fields   = $fields;
        $this->resource = $resource;
        $this->model    = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('AdminLteUiComponentsView::components.pages.show-card');
    }
}
