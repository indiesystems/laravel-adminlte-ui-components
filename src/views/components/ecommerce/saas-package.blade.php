<div class="card card-outline card-{{ $color }} text-center position-relative h-100">

    @if($ribbon)
        <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-{{ $color }}">
                {{ $ribbon }}
            </div>
        </div>
    @endif

    <div class="card-header">
        <h3 class="card-title font-weight-bold">{{ $title }}</h3>
    </div>

    <div class="card-body">
        <h2 class="mb-3">{{ $price }}</h2>

        <ul class="list-unstyled mb-4">
            @foreach($features as $feature)
                <li><i class="fas fa-check text-success mr-2"></i> {{ $feature }}</li>
            @endforeach
        </ul>

        @if($buttonText && $buttonRoute)
            <a href="{{ route($buttonRoute) }}" class="btn btn-{{ $color }} btn-block">
                {{ $buttonText }}
            </a>
        @endif
    </div>
</div>
