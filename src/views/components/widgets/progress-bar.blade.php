@if($title)
<p>
    {{ $title }}
</p>
@endif
<div
    id="{{ $id }}"
    class="{{ $wrapperClasses() }}"

>
    <div
        class="{{ $barClasses() }}"
        style="{{ $barDimension() }}: {{ $value }}%"
        title="{{ $tooltipText() }}"
        role="progressbar"
        aria-valuenow="{{ $value }}"
        aria-valuemin="{{ $min }}"
        aria-valuemax="{{ $max }}"
    >
        @if($showLabel)
            <span>{{ $label ?? "{$value}%" }}</span>
        @elseif($label)
            <span class="sr-only">{{ $label }}</span>
        @endif
    </div>
</div>
@if($description)
<div class="progress-description">{{ $description }}</div>
@endif
