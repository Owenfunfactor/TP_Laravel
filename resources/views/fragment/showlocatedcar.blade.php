@extends('base')

@section('title', 'Vos voitures louées')

@section('content')

    <div class="bg-light p-5 mb-3 text-center">
        <h1>@yield(('title'))</h1>
    </div>

    <div class="container">
        <div class="row">
            @forelse($locations as $loc)
                <div class="col-3 mb-4">
                    @include('fragment.showloc')
                </div>
            @empty
                <div class="col">
                    Aucune voiture n'est loué
                </div>
            @endforelse
        </div>
        <div class="my-4">
            {{ $locations->links() }}
        </div>
    </div>


@endsection
