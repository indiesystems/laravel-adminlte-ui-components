@if ($newtoken = Session::get('newtoken'))
<div class="row">
    <div class="col-lg-6">
        <div class="card text-white bg-warning">
            <div class="card-header">New API Token:</div>
            <div class="card-body">
                <p class="card-text">Please copy it to a safe place.</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{ $newtoken }}">
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<div class="row mt-5">
    <div class="col-lg">
        <div class="card">
                <div class="card-header">
                    <div class="mb-3">
                        <form action="{{ @route('profile.createToken') }}" method="POST">
                                    @csrf
                                    @method('POST')
                            <button type="submit" class="btn btn-primary">{{ __('Create API Token') }}</button>
                        </form>
                    </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-striped table-valign-middle" style="background-color:white;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Token Name</th>
                            <th>Token hash</th>
                            <th>Expires</th>
                            <th>Last Used</th>
                            <th>Create Date</th>
                            <th>Update Date</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @if(auth()->user()->tokens->isNotEmpty())
                            @foreach (auth()->user()->tokens as $token)
                                <tr>
                                    <td>{{ $token->id }}</td>
                                    <td class="long-text"><span>{{ $token->name }}</span></td>
                                    <td class="long-text"><span>{{ $token->token }}</span></td>
                                    <td>{{ $token->expires_at }}</td>
                                    <td>{{ $token->last_used_at }}</td>
                                    <td>{{ $token->created_at }}</td>
                                    <td>{{ $token->updated_at }}</td>
                                    <td>
                                        <form action="{{ route('profile.deleteToken') }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="tokenId" value="{{ $token->id }}">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <tr><td colspan="7">{{ _('No tokens found') }}</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>