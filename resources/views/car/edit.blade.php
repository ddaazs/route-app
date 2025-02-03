<div>
    <h1>This is car edit page</h1>
    <form action="{{ route('cars.update', $car->id) }}" method="POST">
        @csrf
        @method('PUT')
     <div>
         <label for="car_name">Car name</label>
         <input type="text" id="car_name" name="car_name" value="{{ $car->car_name }}">
     </div>
     <div>
         <label for="created_year">Created Year</label>
         <input type="date" id="created_year" name="created_year" value="{{ $car->created_year }}">
     </div>
     <div>
         <button type="submit">Update</button>
         <button type="button" onclick="window.location='{{ route('cars.index') }}'">back</button>
     </div>
     </form>
 </div>
