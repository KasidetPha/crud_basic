<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid mt-2 ms-4">
        <a href="{{ route('create') }}" class="btn btn-primary my-2">Create</a>
        
        <div class="row">
            @foreach ($products as $product)
                <div class="col-4 mb-2">
                    <div class="card border-2 p-3 mb-2">
                        <label for="">Product Name: {{ $product->productName }}</label>
                        <label for="">Price: {{ $product->price }}</label>
                        <label for="">Detail: {{ $product->detail }}</label>
                    </div>
                    <a href="{{route('edit', $product->id)}}" class="btn btn-warning">Edit</a>
                    <a href="{{route('destroy', $product->id)}}" class="btn btn-danger">Delete</a>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>