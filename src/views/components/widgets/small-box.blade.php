<div class="{{ $boxClasses() }}">
    <div class="inner">
        <h3>{{ $title }}</h3>
        <p>{{ $caption }}</p>
    </div>
    <div class="icon">
        <i class="{{ $icon }}"></i>
    </div>

    @if($footerUrl)
        <a href="{{ $footerUrl }}" class="small-box-footer">
            {{ $footerText ?? 'More info' }} <i class="fas fa-arrow-circle-right"></i>
        </a>
    @endif
</div>
