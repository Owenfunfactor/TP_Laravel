<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchCarsRequest;
use App\Models\Car;



class CarController extends Controller
{


    public function index(SearchCarsRequest $request) {

        $query = Car::query();
        if($request->validated('price')){
            $query = $query->where('price','=',$request->validated('price'));
        }

        if($request->validated('brand')){
            $query = $query->where('brand','like',"%{$request->input('brand')}%");
        }

        if($request->validated('name')){
            $query = $query->where('name','like',"%{$request->input('name')}%");
        }

        $cars = Car::paginate(16);
        return view('fragment.index', [
            'cars' => $query->paginate(16),
            'input' => $request->validated()
        ]);
    }

    public function show(string $slug, Car $car)
    {
        $expectedSlug = $car->getSlug();

        if ($slug !== $expectedSlug) {
            return to_route('car.show', ['slug' => $expectedSlug, 'car' => $car]);
        }
            return view('fragment.show',[
                'car' => $car
            ]);

    }


}
