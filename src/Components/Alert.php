<?php
namespace IndieSystems\AdminLteUiComponents\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    protected array $defaultIcons = [
        'info' => 'fas fa-info-circle',
        'success' => 'fas fa-check-circle',
        'warning' => 'fas fa-exclamation-triangle',
        'danger' => 'fas fa-ban',
        'primary' => 'fas fa-star',
        'secondary' => 'fas fa-tag',
    ];

    public function __construct(
        public string $type = 'info',
        public ?string $icon = null,
        public bool $dismissible = false,
        public ?string $class = '',
        public ?string $title = ''
    ) {}

    public function classes(): string
    {
        $base = "alert alert-{$this->type}";

        if ($this->dismissible) {
            $base .= ' alert-dismissible';
        }

        if ($this->class) {
            $base .= " {$this->class}";
        }

        return $base;
    }

    public function showIcon(): bool
    {
        return $this->icon !== false;
    }

    public function resolvedIcon(): ?string
    {
        if ($this->icon === false) {
            return null;
        }

        return $this->icon ?? $this->defaultIcons[$this->type] ?? null;
    }

    public function render()
    {
        return view('AdminLteUiComponentsView::components.alert');
    }
}
