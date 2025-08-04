<?php
namespace IndieSystems\AdminLteUiComponents\Components;

use Illuminate\View\Component;

class Pill extends Component
{
    public string $text;
    public ?string $type;
    public ?string $color;
    public bool $contrast;
    public string $class;
    public string $textColor;

    public function __construct(
        string $text,
        ?string $type = null,
        ?string $color = null,
        bool $contrast = true,
        string $class = ''
    ) {
        $this->text     = $text;
        $this->type     = $type;
        $this->color    = $color;
        $this->contrast = $contrast;
        $this->class    = $class;
        $this->textColor = $this->computeTextColor();
    }

    public function computeTextColor(): string
    {
        if (! $this->contrast || $this->type) {
            return '';
        }

        $hex = ltrim($this->color ?? '#999', '#');
        if (strlen($hex) === 3) {
            $hex = "{$hex[0]}{$hex[0]}{$hex[1]}{$hex[1]}{$hex[2]}{$hex[2]}";
        }

        [$r, $g, $b] = [
            hexdec(substr($hex, 0, 2)),
            hexdec(substr($hex, 2, 2)),
            hexdec(substr($hex, 4, 2)),
        ];

        $yiq = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;
        return $yiq >= 128 ? 'text-dark' : 'text-white';
    }

    public function render()
    {
        return view('AdminLteUiComponentsView::components.pill');
    }
}
