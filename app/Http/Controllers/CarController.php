<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Car;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class CarController extends Controller
{

    public function __construct() {
        // $this->middleware('auth');
        // $this->middleware('log')->only('index');

    }
    public function index()
    {
        $car = new Car;
        return view('car.car',['cars' => $car->all()]);
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
            'car_name' => 'required|string|max:255' ,
            'created_year' => 'required|date',
        ]);
        Car::create($request->all());
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
        Log::info('Updating car with ID: ' . $id, $request->all());

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
        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Car deleted successfully!');
    }
}
