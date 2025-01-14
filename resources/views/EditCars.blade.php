<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Car</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Edit</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="p-5">
        <h1 class="text-center">Edit Car</h1>
        <form action="{{route('updateCar', $car->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="mb-3">
                <label for="" class="form-label">Cars</label>
                <input value="{{$car->Cars}}" type="text" class="form-control" id="" name="Cars">
            </div>

            @error('Cars')
            <div class="alert alert-danger" role="alert">
                {{$message}}
              </div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Brand</label>
                <input value="{{$car->Brand}}" type="text" class="form-control" id="" name="Brand">
            </div>

            @error('Brand')
            <div class="alert alert-danger" role="alert">
                {{$message}}
              </div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Car Type</label>
                <input value="{{$car->Car_Type}}"type="text" class="form-control" id="" name="Car_Type">
            </div>

            @error('Car_Type')
            <div class="alert alert-danger" role="alert">
                {{$message}}
              </div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Fuel Type</label>
                <input value="{{$car->Fuel_Type}}" type="text" class="form-control" id="" name="Fuel_Type">
            </div>

            @error('Fuel_Type')
            <div class="alert alert-danger" role="alert">
                {{$message}}
              </div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input  type="file" class="form-control" id="image" name="image">
            </div>

            @error('image')
            <div class="alert alert-danger" role="alert">
                {{$message}}
              </div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Price</label>
                <select class="form-select" aria-label="Default select example" id = "price" name="price_num">
                    @foreach ($prices as $price)
                      <option value="{{$price->id}}">{{$price->price}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
