@extends('base')

@section('content')


    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1 class="display-4">Cars Shop</h1>
            <p class="lead">La meilleur agence pour des voitures de qualité et fiables.</p>
        </div>
    </div>

    <div class="container">
        <h3>Nos dernières voitures</h3>
        <div class="row">
            @foreach($cars as $car)
                <div class="col">
                    @include('fragment.card')
                </div>
            @endforeach
        </div>
    </div>


@endsection
