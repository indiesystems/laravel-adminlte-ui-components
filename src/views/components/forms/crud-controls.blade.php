<form class="btn-group" action="{{ route($resource . '.destroy', $modelId) }}" method="post">
    <a class="btn btn-success btn-sm" href="{{ route($resource . '.show', $modelId) }}">View</a>
    <a class="btn btn-primary btn-sm" href="{{ route($resource . '.edit', $modelId) }}">Edit</a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
</form>
