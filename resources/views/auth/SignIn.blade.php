@extends('base')

@section('title', 's inscrire')

@section('content')

    <div class="mt-4 container">
        <h1>@yield('title')</h1>

        @include('shared.flash')

        <form method="post" action="{{ route('SignIn') }}" class="vstack gap-3">
            @csrf
            @include('shared.input', ['type' => 'text', 'class' => 'col', 'name' => 'name', 'label' => 'Nom'])
            @include('shared.input', ['type' => 'email', 'class' => 'col', 'name' => 'email', 'label' => 'Email'])
            @include('shared.input', ['type' => 'password', 'class' => 'col', 'name' => 'password', 'label' => 'Mot de passe'])
            @include('shared.input',['type' => 'hidden', 'class' => 'col', 'name' => 'role', 'value' => 'user'])
            <div>
                <button class="btn btn-primary">S'inscrire</button>
            </div>
        </form>
    </div>


@endsection
