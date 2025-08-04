<form action="{{ route($resource . '.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method ?? 'POST')
    <div class="row">
        @foreach($fields as $fieldIndex => $field)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ $field['label'] }}:</strong>
                    @if($field['type'] !== 'select' && $field['type'] !== 'checkbox')
                    <input type="{{ $field['type'] ?? 'text' }}" name="{{ $field['name'] }}" value="{{ old($field['name']) }}" class="form-control {{ $field['class'] ?? '' }}" placeholder="{{ $field['placeholder'] ?? '' }}">
                    @elseif($field['type'] === 'select')
                    <select class="form-control {{ $field['class'] ?? '' }}" style="width: 100%;" tabindex="-1" aria-hidden="true" name="{{ $field['name'] }}{{ in_array('multiple',$field['attributes'] ?? []) ? '[]' : '' }}" id="{{ $field['name'] }}" {{ html_attributes($field['attributes'] ?? []) }}>
                        @if($field['enum'])
                            @foreach($field['enum'] as $option)
                            <option value="{{ $option['value'] ?? '' }}" @selected($field['name'] === ($option['value'] ?? ''))>{{ $option['label'] ?? $option['value'] ?? 'Not defined' }}</option>
                            @endforeach
                        @endif
                    </select>
                    @elseif($field['type'] === 'checkbox')
                    <div class="custom-control custom-switch">
                        <input type="{{ $field['type'] }}" name="{{ $field['name'] }}" value="{{ $field['value'] }}" id="customSwitch{{ $fieldIndex }}" class="form-control custom-control-input {{ $field['class'] ?? '' }}" placeholder="{{ $field['placeholder'] ?? '' }}" @checked( old($field['name']) )>
                        <label class="custom-control-label" for="customSwitch{{ $fieldIndex }}">On/off</label>
                    </div>
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