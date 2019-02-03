@extends('layouts.mainud6')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table border="1">
                      <th>User Name</th>
                      <th>Email</th>
                      <th>User</th>
                      <th>Premium</th>
                      <th>Admin</th>
                      @foreach ($users as $user)
                        <tr>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td><input type="checkbox" name="" value="" {{ $user->hasRole('user') ? 'checked' : ''}} disabled></td>
                          <td><input type="checkbox" name="" value="" {{ $user->hasRole('premium') ? 'checked' : ''}} disabled></td>
                          <td><input type="checkbox" name="" value="" {{ $user->hasRole('admin') ? 'checked' : ''}} disabled></td>
                        </tr>
                      @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
