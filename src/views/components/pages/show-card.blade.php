<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><b>{{ $header }}</b></div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($fields as $field)
                    <li class="list-group-item "><span class="text-bold">{{ $field['label'] }}: </span>{{ $model->{$field['name']} }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>