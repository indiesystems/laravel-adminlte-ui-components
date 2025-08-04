<?php

namespace IndieSystems\AdminLteUiComponents\Components\Widgets;

use Illuminate\View\Component;

class InfoBox extends Component
{
    public function __construct(
        public string $title = '',
        public string|int $number = '',
        public string $icon = 'fas fa-info',
        public string $iconBg = 'bg-info',
        public string $boxBg = '',
        public string $type = '',
        public ?string $class = ''
    ) {
        // override if type is set
        if($this->type){
            $this->boxBg = $this->iconBg = "bg-{$this->type}";
        }
    }

    public function wrapperClasses(): string
    {
        $classes = ['info-box'];

        if ($this->boxBg) {
            $classes[] = $this->boxBg;
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return implode(' ', $classes);
    }

    public function render()
    {
        return view('AdminLteUiComponentsView::components.widgets.info-box');
    }
}
