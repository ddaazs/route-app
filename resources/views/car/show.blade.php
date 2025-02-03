<div>
    id: {{ $car->id }}
</div>
<div>name: {{ $car->car_name }}</div>
<div>created Year: {{ $car->created_year }}</div>
<button type="button" onclick="window.location='{{ route('cars.index') }}'">Back</button>
