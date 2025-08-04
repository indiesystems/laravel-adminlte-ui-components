<?php

namespace IndieSystems\AdminLteUiComponents\Components\Widgets;

use Illuminate\View\Component;

class SmallBox extends Component
{
    public function __construct(
        public string $caption = '',
        public string $title = '',
        public string $icon = 'fas fa-info-circle',
        public string $color = 'bg-info',
        public ?string $footerText = null,
        public ?string $footerUrl = null,
        public ?string $class = ''
    ) {}

    public function boxClasses(): string
    {
        $base = ['small-box', $this->color];

        if ($this->class) {
            $base[] = $this->class;
        }

        return implode(' ', $base);
    }

    public function render()
    {
        return view('AdminLteUiComponentsView::components.widgets.small-box');
    }
}
