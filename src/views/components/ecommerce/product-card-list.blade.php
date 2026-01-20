@php($col = $col ?? $colClasses())
<div class="row">
    @foreach($products as $p)
        <div class="{{ $colClasses() }} {{ $gapClass }} d-flex">
            <div class="w-100 d-flex">
                <x-AdminLteUiComponents-product-card
                    :title="$p['title']"
                    :price="$p['price']"
                    :image="$p['image'] ?? null"
                    :description="$p['description'] ?? null"
                    :features="($p['features'] ?? [])"
                    :button-text="$p['buttonText'] ?? null"
                    :button-route="$p['buttonRoute'] ?? null"
                    :color="$p['color'] ?? 'primary'"
                    :variant="$p['variant'] ?? $layout"
                    :ribbon="$p['ribbon'] ?? null"
                />
            </div>
        </div>
    @endforeach
</div>
