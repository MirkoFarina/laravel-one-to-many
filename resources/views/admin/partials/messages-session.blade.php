@if (session('delete'))
    <div class="alert alert-success" role="alert">
        {{ session('delete') }}
    </div>
@elseif (session('messages'))
    <div class="alert alert-success" role="alert">
        {{ session('messages') }}
    </div>
@endif
