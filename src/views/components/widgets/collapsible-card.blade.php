

<div class="{{ $cardClasses }}" id="{{ $id }}">
    <div class="card-header justify-content-between align-items-center">
        <div class="card-title mb-0">
            @if($icon)
                <i class="{{ $icon }}"></i>
            @endif
            {{ $title }}
        </div>
        <div class="card-tools">
            @if($collapsible)
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas {{ $collapsed ? 'fa-plus' : 'fa-minus' }}"></i>
                </button>
            @endif
            @if($expandable)
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                </button>
            @endif
            @if($removable)
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            @endif
        </div>
    </div>

    <div class="card-body {{ $bodyClass }}">
        {{ $slot }}
    </div>

    @if($footer)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endif
</div>
