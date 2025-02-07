<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Car;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
class CarController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('log')->only('index');
    }
    public function index()
    {
        $show = DB::table('cars')->paginate(15);
        return view('car.car', ['cars' => $show]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('car.create_car');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'car_name' => 'required|string|max:255',
            'created_year' => 'required|date',
            'photos' => 'nullable|array',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $car = Car::create([
            'car_name' => $request->input('car_name'),
            'created_year' => $request->input('created_year'),
        ]);

        if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    if ($photo->isValid()) {
                    $name = $photo->getClientOriginalName();
                    $path = $photo->store('photos', 'public');
                    $size = $photo->getSize();
                    Photo::create([
                        'car_id' => $car->id,
                        'name' => $name,
                        'size' => $size,
                        'saved_at' => $path,
                    ]);
                }
            }
        }
        return redirect()->route('cars.index')->with('success', 'Car added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return view('car.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        return view('car.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'car_name' => 'required|string|max:255',
            'created_year' => 'required|date',
        ]);

        $car = Car::findOrFail($id);

        $car->update($request->only(['car_name', 'created_year']));
        return redirect()->route('cars.index')->with('success', 'Car updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);
        foreach ($car->photos as $photo) {
            Storage::disk('public')->delete($photo->saved_at);
            $photo->delete();
        }
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully!');
    }


    // public function countPhoto(){
    //     $car = DB::table('car')->count('photo');
    //     return route('cars.index',compact($car));
    // }
}
