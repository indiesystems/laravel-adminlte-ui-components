<?php

namespace IndieSystems\AdminLteUiComponents\Components\Ecommerce;

use Illuminate\View\Component;

class SaasPackage extends Component
{
    public string $title;
    public string $price;
    public array $features;
    public ?string $buttonText;
    public ?string $buttonRoute;
    public ?string $ribbon;
    public string $color;

    public function __construct(
        string $title,
        string $price,
        array $features = [],
        string $color = 'primary',
        ?string $buttonText = null,
        ?string $buttonRoute = null,
        ?string $ribbon = null
    ) {
        $this->title       = $title;
        $this->price       = $price;
        $this->features    = $features;
        $this->color       = $color;
        $this->buttonText  = $buttonText;
        $this->buttonRoute = $buttonRoute;
        $this->ribbon      = $ribbon;
    }

    public function render()
    {
        return view('AdminLteUiComponentsView::components.ecommerce.saas-package');
    }
}
