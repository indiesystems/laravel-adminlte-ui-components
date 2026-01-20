<?php

namespace IndieSystems\AdminLteUiComponents\Components\Ecommerce;

use Illuminate\View\Component;

class SaasPackageList extends Component
{
    public array $packages;

    public function __construct(array $packages)
    {
        $this->packages = $packages;
    }

    public function render()
    {
        return view('AdminLteUiComponentsView::components.ecommerce.saas-package-list');
    }
}
