@extends('app.header')
@section('content')
    <div class="card p-4 mx-auto">

        <div class="mb-4  d-flex justify-content-between">
            <div class="mb-4  d-flex justify-content-between">Generate Short URL</div>
            <div><a class="mx-2 mb-3 text-decoration-none text-success border border-success p-2">Invite</a></div>
        </div>


        @error('error')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <form method="POST" action="{{ route('shorturls.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Long Urle</label>
                <input type="text" class="form-control"  value="{{old('long_url')}}" name="long_url">
                @error('long_url')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
           
            <button type="submit" class="btn btn-primary">Generate Url</button>
        </form>
    </div>
@endsection
