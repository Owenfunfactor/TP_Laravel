<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>@yield('title') | Administration</title>
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
                <a class="nav-link" href="#">Accueil </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.locataire') }}">Liste des locataires </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.car.index') }}">Gérer les voitures</a>
            </li>
        </ul>
    </div>
</nav>

  @include('shared.flash')

<footer class="bg-primary text-white text-center py-3 fixed-bottom">
    Copywriting
</footer>

</body>
</html>
