<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">


    <div class="container mt-5">


        <div class="navbar ">
            <div class=" "><a class="text-decoration-none text-warning border border-warning p-2 "
                    href="{{ route('dashboard') }}">>URL</a>
                <a class=" mx-2 mb-3 text-decoration-none text-dark  border p-2"
                    href="{{ route('dashboard') }}">Dashboard</a>
            </div>
            <div class="d-flex justify-content-end">

                <a class=" mx-2 mb-3 text-decoration-none  text-dark border p-2"
                    href="{{ route('dashboard') }}">Welcome, {{ Auth::user()->name }},({{ Auth::user()->role }})</a>
                <a class=" mx-2 mb-3 text-decoration-none  text-dark border p-2" href="{{ route('logout') }}">Logout
                    >></a>
            </div>

        </div>



@yield('content')

        </div>


   
</body>

</html>