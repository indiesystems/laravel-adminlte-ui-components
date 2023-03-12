<?php

namespace IndieSystems\AdminLteUiComponents\Components\Pages;

use Illuminate\View\Component;

class PageHeader extends Component
{

    public $title;
    public $routeName;
    public $buttonName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $routeName, $buttonName)
    {
        $this->title      = $title;
        $this->routeName  = $routeName;
        $this->buttonName = $buttonName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('AdminLteUiComponentsView::components.pages.page-header');
    }
}
