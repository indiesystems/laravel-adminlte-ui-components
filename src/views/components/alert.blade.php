<div class="{{ $classes() }}">
    @if($dismissible)
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    @endif

    @if($title)
    <h5>
        @if($showIcon())
            <i class="{{ $resolvedIcon() }}"></i>
        @endif
        {{ $title }}
    </h5>
    @else
        @if($showIcon())
            <i class="{{ $resolvedIcon() }}"></i>
        @endif
    @endif

    {{ $slot }}
</div>
