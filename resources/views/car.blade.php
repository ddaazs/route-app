
@if (count($cars)==0)
    <div>there no car on db now</div>
    <div>Create some new car?</div>
    <a href="{{ route('cars.create')}}">click</a>
@else
    <div style="display: flex,contents:table">
    @foreach($cars as $car)
        <div>{{$car->id }}</div>
        <div>{{$car->car_name}}</div>
        <div>{{$car->created_year}}</div>
        <div><label >option: </label>
            <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            <a href="{{ route('cars.show', $car->id) }}"><button type="button">show</button></a>
            <a href="{{ route('cars.edit', $car->id) }}"><button type="button">edit</button></a>
        </div>
    @endforeach
    </div>
    <div>Create some new car?</div>
    <a href="{{ route('cars.create')}}">click</a>
@endif
