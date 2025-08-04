<?php
namespace IndieSystems\AdminLteUiComponents\Components;

use Illuminate\View\Component;

class ImageGallery extends Component
{
    public function __construct(
        public array $images = [],
        public int $columns = 3,
        public bool $preview = true,
        public ?string $class = null,
    ) {}

    public function colClass(): string
    {
        return 'col-md-' . (12 / max(1, $this->columns));
    }

    public function render()
    {
        return view('AdminLteUiComponentsView::components.image-gallery');
    }
}
