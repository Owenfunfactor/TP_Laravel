<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarFilterRequest;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::allowIf(auth()->user()->is_Admin);
        return view('admin.cars.index', [
            'cars' => Car::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::allowIf(auth()->user()->is_Admin);
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
        Gate::allowIf(auth()->user()->is_Admin);

        $car = new Car();
        $car->name = $request->input("name");
        $car->brand = $request->input("brand");
        $car->description = $request->input("description");
        $car->price = $request->input("price");
        $car->num_plaq = $request->input("num_plaq");

        if($request->hasFile('image')){
            $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/image', $fileName);
            $car->lien_img = $fileName;
            $car->save();
        }

        return redirect()->route('admin.car.index')->with('success', 'La voiture a bien été créée');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        Gate::allowIf(auth()->user()->is_Admin);
        return view('admin.cars.form', [
            'car' => $car
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        Gate::allowIf(auth()->user()->is_Admin);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'brand' => 'required',
            'num_plaq' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $car->update($request->except('image'));

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $car->update(['image' => str_replace('public/', '', $imagePath)]);
        }

        return redirect()->route('admin.car.index')->with('success', 'La voiture a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        Gate::allowIf(auth()->user()->is_Admin);
        $car->delete();
        return redirect()->route('admin.car.index')->with('success', 'La voiture a bien été supprimée');
    }
}
