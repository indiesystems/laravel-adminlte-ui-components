<?php

namespace IndieSystems\AdminLteUiComponents\Components\Forms;

use Illuminate\View\Component;

class CrudControls extends Component
{
    public $resource;
    public $modelId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($resource, $modelId)
    {
        $this->resource = $resource;
        $this->modelId  = $modelId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('AdminLteUiComponentsView::components.forms.crud-controls');
    }
}
