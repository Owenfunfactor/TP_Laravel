@extends('admin.admin')


@section('title', $car->exists ? "Modifier une voiture" : "Créer une voiture")

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($car->exists ? 'admin.car.update' : 'admin.car.store', ['car' => $car]) }}" method="post">

        @csrf
        @method($car->exists ? 'put' : 'post')

        <div class="row">
            @include('shared.input', [ 'class' =>'col', 'label' => 'Nom', 'name' => 'name', 'value' => $car->name])
            <div class="col row">
                @include('shared.input', [ 'class' =>'col', 'name' => 'brand', 'value' => $car->brand])
                @include('shared.input', [ 'class' =>'col', 'name' => 'num_plaq','label' =>'Numéro_Plaque' ,'value' => $car->num_plaq])
                @include('shared.input', [ 'class' =>'col', 'name' => 'price','label' =>'Prix' ,'value' => $car->price])
            </div>
        </div>
        @include('shared.input', ['type' => 'textarea' , 'name' => 'description' ,'value' => $car->description])

        @include('shared.checkbox', [ 'name' => 'status','label' => 'Louer' ,'value' => $car->status])


        <div>
            <button class="btn btn-primary">
                @if($car->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>

    </form>

@endsection
