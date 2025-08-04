@php
    $bgClass = $type ? "bg-$type" : '';
    $bgStyle = (!$type && $color) ? "background-color: {$color};" : '';
@endphp

<span
    class="badge badge-pill {{ $bgClass }} {{ $textColor }} {{ $class }}"
    style="{{ $bgStyle }}"
>{{ $text }}</span>