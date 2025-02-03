<div>
   <h1>This is car create page</h1>
   <form action="{{ route('cars.store') }}" method="post">
    @csrf
    <div>
        <label for="car_name">Car name</label>
        <input type="text" id="car_name" name="car_name">
    </div>
    <div>
        <label for="created_year">Created Year</label>
        <input type="date" id="created_year" name="created_year">
    </div>
    <div>
        <button type="submit">add</button>
        <button type="button" onclick="window.location='{{ route('cars.index') }}'">back</button>
    </div>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
