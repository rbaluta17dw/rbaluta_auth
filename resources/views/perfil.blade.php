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
                        session ('status')
                    @endif

                    <h3>Usuario:</h3><p>{{Auth::user()->name}}</p>
                    <h3>Email:</h3><p>{{Auth::user()->email}}</p>
                    <h3>Fecha de Registro:</h3><p>{{Auth::user()->created_at}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
