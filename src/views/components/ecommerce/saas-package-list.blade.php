<div class="row">
    @foreach($packages as $package)
        <div class="col-md-4 mb-4">
            <x-AdminLteUiComponents-saas-package
                :title="$package['title']"
                :price="$package['price']"
                :features="$package['features']"
                :color="$package['color'] ?? 'primary'"
                :buttonText="$package['buttonText'] ?? null"
                :buttonRoute="$package['buttonRoute'] ?? null"
                :ribbon="$package['ribbon'] ?? null"
            />
        </div>
    @endforeach
</div>
