@extends('admin.admin')

@section('title', 'Toutes les voitures')

@section('content')


    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield(('title'))</h1>
        <a href="{{ route('admin.car.create')  }}" class="btn btn-primary">Ajouter une voiture</a>
    </div>


    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nom</th>
            <th>description</th>
            <th>Marque</th>
            <th>Plaque</th>
            <th>Prix</th>
            <th class="text-end">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
                <tr>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->description }}m</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->num_plaq }}</td>
                    <td>{{ number_format($car->price, thousands_separator: ' ') }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.car.edit', $car) }}" class="btn btn-primary">Modifier</a>
                            <form action="{{ route('admin.car.destroy', $car) }}" method="post">
                                @csrf
                                @method("delete")
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $cars->links() }}

@endsection
