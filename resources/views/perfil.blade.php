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
                    @if (session('imagen')!= null)
                      <img src="{{session('imagen')}}" alt="">
                    @endif
                    @auth
                    <form class="" action="{{ route('imagen') }}" method="post">
                      @csrf
                      <input type="text" name="imagen" value="">
                      <input type="submit" name="enviar" value="enviar">
                    </form>
                    <form class="" action="{{ route('cambio') }}" method="post">
                    @csrf
                    <h3>Usuario:</h3><p>{{Auth::user()->name}}</p>
                    <input type="text" style="display: none;" name="name" placeholder="{{Auth::user()->name}}" value="{{Auth::user()->name}}">
                    <h3>Email:</h3><p>{{Auth::user()->email}}</p>
                    <input type="text" style="display: none;" name="email" placeholder="{{Auth::user()->email}}" value="{{Auth::user()->email}}">
                    <h3>Fecha de Registro:</h3><p>{{Auth::user()->created_at}}</p>
                    <h4 class="pass" style="display: none;">Antigua Contraseña</h4>
                    <input type="password" style="display: none;" name="passwordold" value="">
                    <h4 class="pass" style="display: none;">Nueva Contraseña</h4>
                    <input type="password" style="display: none;" name="passwordnew" value="">
                    <br>
                    <img id="config" src="" alt="">
                    <input type="submit" style="display: none;" name="cambio" value="cambiar">
                    </form>
                    <a href="{{ route('usuario.tema') }}">Cambiar Tema</a>
                    @else
                    <h3>Ya no estas conectado por favor ingrese de nuvevo.</h3>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
