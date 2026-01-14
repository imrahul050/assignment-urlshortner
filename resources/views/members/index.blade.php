
@extends('app.header')
@section('content')

        <div class="card p-4 mx-auto">

            <div class="mb-4  d-flex justify-content-between">
                 <div class="mb-4  d-flex justify-content-between">Team Members</div>

                <div><a href="{{route('members.create')}}" class="mx-2 mb-3 text-decoration-none text-success border border-success p-2">Invite</a></div>
            </div>

          
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Generated URLs</th>
                            <th>Total URL HITs</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($members as $member)
                            <tr>
                                <td>
                                    {{ $member->name }}<br>
                                    <small>{{ $member->email }}</small>
                                </td>
                                <td>{{ $member->role }}</td>
                               <td>{{ $member->myShortUrls->count()  ?? 0 }}</td>
                            <td>{{ $member->myShortUrls()->sum('hits')  ?? 0 }}</td>
                                

                      



                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No Members Found.</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
         
        </div>

@endsection