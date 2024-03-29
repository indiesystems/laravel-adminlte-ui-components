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
                    <tr class="{{ in_array(\IndieSystems\AdminLteUiComponents\Traits\Formable::class, class_uses_recursive($entry::class)) ? $entry->getHtmlClasses() : '' }}">
                        <td><a href="{{ route( $resource . '.show', $entry->id) }}">{{ $entry->{$fields[0]} }}</a></td>
                        @foreach(array_slice($fields, 1) as $field)
                            @if(in_array(\IndieSystems\AdminLteUiComponents\Traits\Formable::class, class_uses_recursive($entry::class)))
                                @if($entry->isField($field,'select'))
                                    <td>{{ $entry->getSelectedFieldLabel($field, $entry->{$field}) }}</td>
                                    @continue
                                @endif
                                @if($entry->isField($field,'file'))
                                    <td><a href="{{ !empty($entry->{$field}) ? asset($entry->{$field}) : '#' }}" target="{{ !empty($entry->{$field}) ? '_blank' : '_self' }}">{{ $entry->{$field} ? __('Download') : 'No file' }}<a/></td>
                                    @continue
                                @elseif($entry->isField($field,'image'))
                                    <td class="w-25"><div class="text-center"><img src="{{ asset($entry->{$field}) ?: $entry->{$field} }}" alt="" class="mx-auto img-fluid img-thumbnail" style="width:75px;"></div></td>
                                    @continue
                                @elseif($entry->isField($field,'color'))
                                    <td><span class="color-field badge badge-pill" style="width:25px; height:25px; display: block; background-color:{{ $entry->{$field} ?: ''  }};"></span></td>
                                    @continue
                                @endif
                            @endif
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