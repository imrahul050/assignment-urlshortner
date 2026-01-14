
@extends('app.header')
@section('content')

        <div class="card p-4 mx-auto">

            <div class="mb-4  d-flex justify-content-between">
                 <div class="mb-4  d-flex justify-content-between">Clients</div>

                <div><a href="{{route('clients.create')}}" class="mx-2 mb-3 text-decoration-none text-success border border-success p-2">Invite</a></div>
            </div>

          
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Users</th>
                            <th>Generated URLs</th>
                            <th>Total URL HITs</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($clients as $client)
                            <tr>
                                <td>
                                    {{ $client->name }}<br>
                                    <small>{{ $client->email }}</small>
                                </td>
                                <td>{{ $client->clientmembers->count()  ?? 0 }}</td>
                            <td>{{ $client->clientTotalShortUrls->count()  ?? 0 }}</td>
                            <td>{{ $client->clientTotalShortUrls()->sum('hits')  ?? 0 }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No Clients Found.</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
         
        </div>

@endsection