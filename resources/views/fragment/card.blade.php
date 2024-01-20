<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('car.show', ['slug' => $car->getSlug(), 'car' => $car]) }}">{{ $car->name }}</a>
        </h5>
        <p class="card-text">{{ $car->description }} - {{ $car->brand }}</p>
        <div class="text-primary fw-bold" style="font-size: 1.4rem;">
            {{ number_format($car->price, thousands_separator: ' ') }} €
        </div>
    </div>
</div>
