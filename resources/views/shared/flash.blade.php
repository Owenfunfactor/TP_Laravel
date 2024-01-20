


@if($errors->any())
    <div class="alert alert-danger">
        <ul class="my-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container mt-5">
    @if(session('succes'))
        <div class="alert alert-success">
            {{ session('succes') }}
        </div>
    @endif
    @yield('content')
</div>
