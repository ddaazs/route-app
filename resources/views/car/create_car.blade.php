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
    <div>
        <form class="mx-auto mt-3 form-control" enctype="multipart/form-data" action="{{ route('cars.store') }}" method="post">
            <h1>This is car create page</h1>
         @csrf
         <div class="input-group-text">
             <label class="col-form-label" for="car_name">Car name:</label>
             <input class="mx-4" type="text" id="car_name" name="car_name">
         </div>
         <div class="mt-2 input-group-text">
             <label for="created_year">Created Year:</label>
             <input class="mx-2" type="date" id="created_year" name="created_year">
         </div>
         <div class="mt-2 input-group-text">
            <label for="photo">Photo:</label>
            <input class="border ms-5" type="file" id="photos" name="photos[]" multiple>
        </div>
         <div class="input-group btn">
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
</body>
</html>

