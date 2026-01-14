@extends('app.header')
@section('content')
    <div class="card p-4 mx-auto">

        <div class="mb-4  d-flex justify-content-between">
            <div class="mb-4  d-flex justify-content-between">Invite Member</div>
            <div><a class="mx-2 mb-3 text-decoration-none text-success border border-success p-2">Invite</a></div>
        </div>


        @error('error')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <form method="POST" action="{{ route('members.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control"  value="{{old('name')}}" name="name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label ">Email</label>
                <input type="email" class="form-control"  value="{{old('email')}}" name="email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Role</label>
                <select class="form-control" name="role">
                    <option value="Admin" @selected(old('role') == 'Admin')>Admin</option>
                    <option value="Member" @selected(old('role') == 'Member')>Member</option>
                </select>
                @error('role')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Member</button>
        </form>
    </div>
@endsection
