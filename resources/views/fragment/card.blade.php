<div class="card" style="max-width: 300px;">
    <div class="card-body">
        @if($car->lien_img)
        <img src="{{ asset('storage/app/image/'.$car->lien_img) }}" alt="" class="img-fluid" style="max-width: 100%; height: auto; max-height: 150px;">
        @else
            <span>No image found !</span>
        @endif
        <h5 class="card-title">
            <a href="{{ route('car.show', ['slug' => $car->getSlug(), 'car' => $car]) }}">{{ $car->name }}</a>
        </h5>
        <p class="card-text">{{ $car->description }} - {{ $car->brand }}</p>
        <div class="text-primary fw-bold" style="font-size: 1.2rem;">
            {{ number_format($car->price, thousands_separator: ' ') }} €
        </div>
    </div>
</div>


