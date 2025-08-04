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
                        @elseif($model->isField($field['name'],'image'))
                            <div class="w-25"><div class="text-center"><img src="{{ asset($model->{$field['name']}) ?: $model->{$field['name']} }}" alt="" class="mx-auto img-fluid img-thumbnail" style="width:75px;"></div></div>
                            @continue
                        @elseif($model->isField($field['name'],'color'))
                            <div class="w-25"><span class="color-field badge badge-pill" style="width:25px; height:25px; display: block; background-color:{{ $model->{$field['name']} ?: ''  }};"></span></divdi>
                            @continue
                        @elseif($model->isField($field['name'],'password'))
                            @php $inputId = 'secret-' . \Str::uuid(); @endphp
                            <span id="{{ $inputId }}"
                                  style="filter: blur(5px); transition: 0.3s;"
                                  class="text-monospace"
                            >{{ $model->{$field['name']} }}</span>
                            <button
                                type="button"
                                class="btn btn-sm btn-link p-0 align-baseline ml-2"
                                onclick="
                                    const el = document.getElementById('{{ $inputId }}');
                                    const btn = this.querySelector('i');
                                    if (el.style.filter) {
                                        el.style.filter = '';
                                        btn.className = 'fas fa-eye-slash';
                                    } else {
                                        el.style.filter = 'blur(5px)';
                                        btn.className = 'fas fa-eye';
                                    }
                                "
                            >
                                <i class="fas fa-eye"></i>
                            </button>
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