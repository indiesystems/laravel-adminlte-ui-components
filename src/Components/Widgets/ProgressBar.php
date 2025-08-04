<?php
namespace IndieSystems\AdminLteUiComponents\Components\Widgets;

use Illuminate\View\Component;

class ProgressBar extends Component
{

    public string $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public int $value = 0,
        public int $min = 0,
        public int $max = 100,
        public string $color = 'primary',
        public string $size = '', // '', sm, xs, xxs
        public bool $striped = false,
        public bool $animated = false,
        public bool $vertical = false,
        public ?string $label = null,
        public ?string $tooltip = null,
        public bool $showLabel = false,
        public ?string $class = '',
        public ?string $barClass = '',
        public ?string $title = '',
        public ?string $description = '',
        ?string $id = null,

    ) {
        $this->id = $id ?? 'progress-' . uniqid();
    }

    public function wrapperClasses(): string
    {
        $classes = ['progress'];

        if ($this->size) {
            $classes[] = "progress-{$this->size}";
        }

        if ($this->vertical) {
            $classes[] = 'vertical';
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return implode(' ', $classes);
    }

    public function barClasses(): string
    {
        $classes = ["progress-bar", "bg-{$this->color}"];

        if ($this->striped) {
            $classes[] = 'progress-bar-striped';
        }

        if ($this->animated) {
            $classes[] = 'progress-bar-animated';
        }

        if ($this->barClass) {
            $classes[] = $this->barClass;
        }

        return implode(' ', $classes);
    }

    public function tooltipText(): string
    {
        return $this->tooltip ?? "{$this->value}%";
    }

    public function barDimension(): string
    {
        return $this->vertical ? 'height' : 'width';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('AdminLteUiComponentsView::components.widgets.progress-bar');
    }
}
