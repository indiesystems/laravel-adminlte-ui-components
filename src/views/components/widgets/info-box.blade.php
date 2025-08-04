<div class="{{ $wrapperClasses() }}">
    <span class="info-box-icon {{ $iconBg }}">
        <i class="{{ $icon }}"></i>
    </span>

    <div class="info-box-content">
        <span class="info-box-text">{{ $title }}</span>
        <span class="info-box-number">{{ $number }}</span>

        {{ $slot }}
    </div>
</div>
