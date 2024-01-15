<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarFilterRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.cars.index',[
           'cars' => Car::orderBy('created_at','desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $car = new Car();

        $car->fill([
            'name' => 'mazzerati',
            'description' => 'Une voiture de luxe',
            'brand' => 'lanborgini',
            'num_plaq' => 'BJ-4026',
            'price' => 2000000,
        ]);
        return view('admin.cars.form', [
            'car' =>  $car
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarFilterRequest $request)
    {
        $car = Car::create($request->validated());
        return to_route('admin.car.index')->with('succes', 'La voiture a bien été créer');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('admin.cars.form',[
            'car' => $car
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarFilterRequest $request, Car $car)
    {
        $car->update($request->validated());
        return to_route('admin.car.index')->with('succes', 'La voiture a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return to_route('admin.car.index')->with('succes', 'La voiture a bien été supprimé');
    }
}
