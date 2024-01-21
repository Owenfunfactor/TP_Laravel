<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>@yield('title') | CarShop</title>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Cars shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">Accueil </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('car.index') }}">Liste des voitures </a>
            </li>
            @auth
            <li class="nav-item active">
                    <a href="{{ route('list-locations') }}" class="nav-link">Liste des voitures loués</a>
            </li>
            @endauth
        </ul>
        @auth
        <div class="ms-auto">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-light">Tableau de bord</a>
        </div>
        @endauth
    </div>
</nav>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="my-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    @yield('content')

<footer class="bg-primary text-white text-center py-3 ">
    Copywriting
</footer>

</body>
</html>
