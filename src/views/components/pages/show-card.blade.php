<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><b>{{ $header }}</b></div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($fields as $field)
                    <li class="list-group-item "><span class="text-bold">{{ $field['label'] }}: </span>
                        @if($model->isField($field['name'],'select'))
                            {{ $model->getSelectedFieldLabel($field['name'], $model->{$field['name']}) }}
                            @continue
                        @endif
                        @if($model->isField($field['name'],'file'))
                            <a href="{{ !empty($model->{$field['name']}) ? asset($model->{$field['name']}) : '#' }}" target="{{ !empty($model->{$field['name']}) ? '_blank' : '_self' }}">{{ $model->{$field['name']} ? __('Download') : 'No file' }}<a/>
                            @continue
                        @endif
                        {{ $model->{$field['name']} }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>