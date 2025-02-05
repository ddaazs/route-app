<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Create Car</title>

        <link href="https://bootswatch.com/5/sketchy/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
<body>
    <div class="container mx-3">
        <div class="mt-3">
            id: {{ $car->id }}
        </div>
        <div class="mt-1">name: {{ $car->car_name }}</div>
        <div>created Year: {{ $car->created_year }}</div>
        @foreach ($car->photos as $photo)
        <div ><img style="width:100px; height:100px;" src="/storage/{{ $photo['saved_at'] }}" alt="Car Photo"></div>
        @endforeach
        <button class="mt-1 button" type="button" onclick="window.location='{{ route('cars.index') }}'">Back</button>
    </div>
</body>
</html>

