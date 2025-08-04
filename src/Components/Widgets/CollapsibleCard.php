<?php
namespace IndieSystems\AdminLteUiComponents\Components\Widgets;

use Illuminate\View\Component;

class CollapsibleCard extends Component
{

    public string $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $title = '',
        public ?string $icon = null,
        public bool $collapsible = false,
        public bool $collapsed = false,
        public ?string $footer = null,
        public string $color = '',
        public ?string $cardClass = '',
        public ?string $bodyClass = '',
        public bool $removable = false,
        public bool $expandable = false,
        ?string $id = null,

    ) {
        $this->id = $id ?? 'card-' . uniqid();
    }

    public function collapseIcon(): string
    {
        return $this->collapsed ? 'fa-plus' : 'fa-minus';
    }

    public function cardClasses(): string
    {
        $classes = ['card'];

        if ($this->collapsed) {
            $classes[] = 'collapsed-card';
        }

        if ($this->color) {
            $classes[] = 'card-' . $this->color;
        }

        if ($this->cardClass) {
            $classes[] = $this->cardClass;
        }

        return implode(' ', $classes);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('AdminLteUiComponentsView::components.widgets.collapsible-card');
    }
}
