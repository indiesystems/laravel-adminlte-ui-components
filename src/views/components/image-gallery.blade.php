<div class="row {{ $class }}">
    @foreach($images as $index => $img)
        <div class="{{ $colClass() }} mb-3">
            <img
                src="{{ is_array($img) ? $img['src'] : $img }}"
                alt="{{ is_array($img) ? ($img['alt'] ?? 'Image') : 'Image' }}"
                class="img-fluid img-thumbnail"
                style="cursor: {{ $preview ? 'pointer' : 'default' }}"
                @if($preview)
                    data-toggle="modal"
                    data-target="#galleryModal"
                    data-img="{{ is_array($img) ? $img['src'] : $img }}"
                @endif
            />
        </div>
    @endforeach
</div>

@if($preview)
    <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-body text-center p-0">
                    <img src="" class="img-fluid" id="galleryModalImg" />
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).on('click', '[data-toggle="modal"][data-img]', function () {
                $('#galleryModalImg').attr('src', $(this).data('img'));
            });
        </script>
    @endpush
@endif
