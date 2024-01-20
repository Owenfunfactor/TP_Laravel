<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'user_id' => 'required',
                'car_id' => 'required',
            ]
        );

        $location = Location::create([
            'user_id' => $request->input('user_id'),
            'car_id' => $request->input('car_id'),
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        $location = Location::with('car')->where('user_id', auth()->user()->id)->paginate(10);
        return view('fragment.showlocatedcar', compact('location'));
    }

    public function showuser(Location $location)
    {
        $location = Location::with('user')->distinct('user_id')->paginate(10);
        return view('admin.locataire.index', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {

        $location->delete();
    }
}
