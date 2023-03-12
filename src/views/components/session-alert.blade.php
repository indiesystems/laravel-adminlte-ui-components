@if(session('status'))
<div class="alert alert-info mb-1 mt-1">
    {{ session('status') }}
</div>
@endif
@if(session('success'))
<div class="alert alert-success mb-1 mt-1">
    {{ session('success') }}
</div>
@endif
@if(session('error'))
<div class="alert alert-danger mb-1 mt-1">
    {{ session('error') }}
</div>
@endif