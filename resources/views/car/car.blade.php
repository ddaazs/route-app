<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car</title>

    <link href="https://bootswatch.com/5/sketchy/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    @if (count($cars) == 0)
        <div>There are no cars in the database now.</div>
        <div>Create a new car?</div>
        <a href="{{ route('cars.create') }}">Add car</a>
    @else
        <table class='table mx-1 mt-3'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Car Name</th>
                    <th>Created Year</th>
                    <th>Photo</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    @if ($car->deleted_at !== null)
                        @continue
                    @else
                        <tr>
                            <td>{{ $car->id }}</td>
                            <td>{{ $car->car_name }}</td>
                            <td>{{ $car->created_year }}</td>
                            <td>
                                {{-- {{ route('photos.count',$car->id) }} --}}
                            </td>
                            <td>
                                <a href="{{ route('cars.show', $car->id) }}" class="btn btn-info">Show</a>
                                <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('cars.destroy', $car->id) }}" method="post"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        {{ $cars->links() }}
        <div>Create a new car?
        <button onclick="window.location='{{ route('cars.create') }}'">Add car</button>
    </div>
    @endif
    <div class="mx-2 mt-3">
        <a class="button" href="{{ route('welcome') }}">Back to home</a>
    </div>
</body>

</html>
