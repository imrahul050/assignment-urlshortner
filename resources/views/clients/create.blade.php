@extends('app.header')
@section('content')
    <div class="card p-4 mx-auto">

        <div class="mb-4  d-flex justify-content-between">
            <div class="mb-4  d-flex justify-content-between">Clients</div>
            <div><a class="mx-2 mb-3 text-decoration-none text-success border border-success p-2">Invite</a></div>
        </div>


        @error('error')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <form method="POST" action="{{ route('clients.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" >
                 @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
            </div>
            <div class="mb-3">
                <label class="form-label ">Email</label>
                <input type="email" class="form-control" name="email" >
                @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" >
                 @error('password')
            <div class="text-danger">{{ $message }}</div>
        @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Client</button>
        </form>
    </div>
@endsection
