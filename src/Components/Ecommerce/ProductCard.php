<?php
namespace IndieSystems\AdminLteUiComponents\Components\Ecommerce;

use Illuminate\View\Component;

class ProductCard extends Component
{
    public function __construct(
        public string $title,
        public string $price,
        public string $color = 'primary',
        public ?string $image = null,
        public ?string $description = null,
        public array $features = [],
        public ?string $buttonText = null,
        public ?string $buttonRoute = null,
        public ?string $variant = null, //card|tile|horizontal
        public ?string $ribbon = null 
    ) {
    }

    public function render()
    {
        return view('AdminLteUiComponentsView::components.ecommerce.product-card');
    }
}
