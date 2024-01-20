<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('list-locations', [ 'car' => $loc->car]) }}">{{ $loc->car->name }}</a>
        </h5>
        <p class="card-text">{{ $loc->car->description }} - {{ $loc->car->brand }}</p>
        <div class="text-primary fw-bold" style="font-size: 1.4rem;">
            {{ number_format($loc->car->price, thousands_separator: ' ') }} €
        </div>
        <form action="{{ route('destroyloc', $loc->id) }}" method="get">
            @csrf

            <button class="btn btn-success">Rendre</button>
        </form>

    </div>
</div>
