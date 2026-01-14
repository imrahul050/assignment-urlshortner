<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Here</title>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  

    <div class="container mt-5 w-50">
        <form class="  border p-4 shadow" method="POST" action="{{ route('logged-in') }}">
            <div class="">
                <h4>Login Here</h4>
            </div>
            @csrf
            @error('message')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="form-group mb-3">
                <label class="form-label">Email</label>
                <input  class="form-control" type="email" value="{{old('email')}}" name="email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="form-label">Password </label>
                <input class="form-control" type="password" name="password">
                  @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                    <input class="btn btn-success" type="submit" value="Login">
            </div>
        </form>
    </div>



</body>

</html>
