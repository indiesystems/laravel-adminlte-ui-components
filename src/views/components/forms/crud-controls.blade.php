<form class="btn-group" action="{{ route($resource . '.destroy', $modelId) }}" method="post">
    @can($resource . '.list')
    <a class="btn btn-success btn-sm" href="{{ route($resource . '.show', $modelId) }}">View</a>
    @endcan
    @can($resource . '.edit')
    <a class="btn btn-primary btn-sm" href="{{ route($resource . '.edit', $modelId) }}">Edit</a>
    @endcan
    @csrf
    @method('DELETE')
    @can($resource . '.delete')
    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
    @endcan
</form>
