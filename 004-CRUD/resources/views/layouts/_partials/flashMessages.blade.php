@if (Session::get('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if (Session::get('danger'))
<div class="alert alert-danger">
    {{ session('danger') }}
</div>
@endif