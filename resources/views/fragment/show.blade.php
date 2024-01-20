@extends('base')

@section('title', $car->name)

@section('content')

    @include('shared.flash')

    <div class="container">
    <h1>{{ $car->name }}</h1>
    <h2>{{ $car->brand }} - {{ $car->description }}</h2>

    <div class="text-primary fw-bold" style="font-size: 4rem;" >
        {{ number_format($car->price, thousands_separator: ' ') }} €
    </div>

        <form class="vstack gap-2" action="{{ route('location') }}" method="post">
            @csrf
            <div class="row">
                <div class="col row">
                    <input type="number" hidden name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id  }}"  />
                    <input type="number" hidden name="car_id" value="{{ $car->id  }}"  />
                </div>
            </div>
            <div>
                <button class="btn btn-primary">
                    Louer
                </button>
            </div>
        </form>

    </div>


@endsection
