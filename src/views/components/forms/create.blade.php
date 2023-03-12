<form action="{{ route($resource . '.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method ?? 'POST')
    <div class="row">
        @foreach($fields as $field)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ $field['label'] }}:</strong>
                    <input type="{{ $field['type'] ?? 'text' }}" name="{{ $field['name'] }}" value="{{ old($field['name']) }}" class="form-control" placeholder="{{ $field['placeholder'] ?? '' }}">
                    @error($field['name'])
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary btn-sm ml-3">Submit</button>
    </div>
</form>