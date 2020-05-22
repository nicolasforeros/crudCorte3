@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if (session('statusError'))
    <div class="alert alert-danger">
        {{ session('statusError') }}
    </div>
@endif