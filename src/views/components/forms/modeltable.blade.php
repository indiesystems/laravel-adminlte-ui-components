<div class="card">
    @yield('modelTableHeader')
    <div class="card-body table-responsive p-0">
        <table class="table table-bordered table-striped table-valign-middle">
            <thead>
                <tr>
                    @foreach($headers as $header)
                        <th>{{ $header }}</th>
                    @endforeach
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($collection as $entry)
                    <tr>
                        <td><a href="{{ route( $resource . '.show', $entry->id) }}">{{ $entry->{$fields[0]} }}</a></td>
                        @foreach(array_slice($fields, 1) as $field)
                        <td>{{ $entry->{$field} }}</td>
                        @endforeach
                        <td>
                            <x-AdminLteUiComponentsView::forms.crud-controls :resource="$resource" :modelId="$entry->id"/>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $collection->links() !!}