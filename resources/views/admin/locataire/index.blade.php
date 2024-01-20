@extends('admin.admin')

@section('title', 'Tous les locataires')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield(('title'))</h1>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nom</th>
            <th class="text-end">Email</th>
        </tr>
        </thead>
        <tbody>
        @forelse($locations as $loc)
            <tr>
                <td>{{ $loc->user->name }}</td>
                <td class="text-end">{{ $loc->user->email }}</td>
            </tr>
        @empty
            <div class="col">
                Personne n'a loué de voiture
            </div>
        @endforelse
        </tbody>
    </table>

    {{ $locations->links() }}

@endsection
