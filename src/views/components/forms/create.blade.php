<form action="{{ route($resource . '.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method ?? 'POST')
    <div class="row">
        @foreach($fields as $field)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ $field['label'] }}:</strong>
                    @if($field['type'] !== 'select')
                    <input type="{{ $field['type'] ?? 'text' }}" name="{{ $field['name'] }}" value="{{ old($field['name']) }}" class="form-control" placeholder="{{ $field['placeholder'] ?? '' }}">
                    @elseif($field['type'] === 'select')
                    <select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" name="{{ $field['name'] }}" id="{{ $field['name'] }}">
                        @if($field['enum'])
                            @foreach($field['enum'] as $option)
                            <option value="{{ $option['value'] ?? '' }}">{{ $option['label'] ?? $option['value'] ?? 'Not defined' }}</option>
                            @endforeach
                        @endif
                    </select>
                    @endif
                    @error($field['name'])
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary btn-sm ml-3">Submit</button>
    </div>
</form>