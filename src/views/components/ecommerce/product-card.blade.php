@php
    $isTile = $variant === 'tile';
    $isHorizontal = $variant === 'horizontal';
@endphp

<div class="card card-outline card-{{ $color }} {{ $isHorizontal ? 'flex-row' : '' }} h-100 product-card position-relative">

    @if($ribbon)
        <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-{{ $color }}">{{ $ribbon }}</div>
        </div>
    @endif

    {{-- Media --}}
    @if($image)
        @if($isHorizontal)
            <div class="p-3" style="width:220px;flex:0 0 220px;">
                <img src="{{ $image }}" alt="{{ $title }}" class="img-fluid w-100" style="height:180px;object-fit:contain;">
            </div>
        @else
            <div class="p-3">
                <img src="{{ $image }}" alt="{{ $title }}" class="img-fluid w-100" style="height:220px;object-fit:contain;">
            </div>
        @endif
    @endif

    <div class="card-body d-flex flex-column">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-baseline mb-2">
            <h5 class="mb-0 font-weight-bold">{{ $title }}</h5>
            <span class="h5 text-{{ $color }} mb-0">{{ $price }}</span>
        </div>

        {{-- Content --}}
        @if(!$isTile && $description)
            <p class="text-muted mb-3">{{ $description }}</p>
        @endif

        @if(!$isTile && !empty($features))
            <ul class="list-unstyled mb-3">
                @foreach($features as $f)
                    <li class="mb-1"><i class="fas fa-check text-success mr-2"></i>{{ $f }}</li>
                @endforeach
            </ul>
        @endif

        {{-- Spacer to push footer down --}}
        <div class="mt-auto"></div>

        {{-- Footer / CTA --}}
        @if($buttonText && $buttonRoute)
            <div class="card-footer bg-transparent border-0 px-0 pt-0">
                <a href="{{ route($buttonRoute) }}" class="btn btn-{{ $color }} btn-block">
                    {{ $buttonText }}
                </a>
            </div>
        @endif
    </div>
</div>
