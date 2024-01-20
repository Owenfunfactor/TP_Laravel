@extends('base')

@section('title', 'Toutes nos voitures')

@section('content')

    <div class="bg-light p-5 mb-5 text-center">
        <form action="" method="get" class="container d-flex gap-2">
            <input type="number" placeholder="budget" class="form-control" name="price" value="{{ $input['price'] ?? '' }}">
            <input type="text" placeholder="Marque" class="form-control" name="brand" value="{{ $input['brand'] ?? '' }}">
            <input type="text" placeholder="Nom de la voiture" class="form-control" name="name" value="{{ $input['name'] ?? '' }}">
            <button class="btn btn-primary btn-sm flex-grow-0">
                Rechercher
            </button>
        </form>
    </div>



    <div class="container">
        <div class="row">
            @forelse($cars as $car)
                <div class="col-3 mb-4">
                    @include('fragment.card')
                </div>
            @empty
                <div class="col">
                    Aucune voiture ne correspond à vos critères
                </div>
            @endforelse
        </div>
        <div class="my-4">
            {{ $cars->links() }}
        </div>
    </div>




@endsection
