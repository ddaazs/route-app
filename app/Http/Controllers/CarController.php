<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use Illuminate\Routing\Controller;
use App\Models\Car;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('log')->only('index');
    }
    public function index()
    {
        $show = Car::withCount('photos')->paginate(15);

        return response()->view('car.car', ['cars' => $show]);
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
    public function store(CarRequest $request)
    {
        $car = Car::create([
            'car_name' => $request->car_name,
            'created_year' => $request->created_year,
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
    public function update(CarRequest $request, string $id)
    {
        $validate = $request->validated();
        $car = Car::findOrFail($id);
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
        $car->update($request->only(['car_name', 'created_year' => date('Y', strtotime($request->input('created_year')))]));
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
}
