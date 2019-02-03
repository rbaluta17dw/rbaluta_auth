<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AppController extends Controller
{
  public function __construct()
  {
    //$this->middleware('auth');
    $this->middleware('example', ['only'=>['index']]);
  }

  public function index()
  {
    return view('ud6');
  }

  public function mensajes()
  {
    return view('mensajes');
  }
  public function admin()
  {
    $users = User::all();
    return view('admin', ['users' => $users]);
  }
  public function enviarmensaje()
  {
    return view('mensaje');
  }

  public function perfil()
  {
    return view('perfil');
  }
  public function imagen(Request $request)
  {
    $imagen = $request->input('imagen');
    $imagen_session = session($imagen);
    return view('perfil');
  }
  public function cambiarTema(){
    $tema = Cookie::get('tema') != null ? Cookie::get('tema') : null;
    if ($tema == 'claro' || !$tema) {
      return response('ud6')->cookie(
        'tema', 'oscuro', 10);
      }elseif ($tema == 'oscuro') {
        return response('ud6')->cookie(
          'tema', 'claro', 10);
        }
      }

      public function cambio(Request $request)
      {
        $name = $request->input('name');
        $email = $request->input('email');
        $passwordold = $request->input('$passwordold');
        $passwordnew = $request->input('$passwordnew');

        $user = User::find(Auth::user()->id);

        $user->name = $name;
        $user->email = $email;
        if ($user->password == Hash::make($passwordold)) {
          $user->password = Hash::make($passwordnew);
        }

        $user->save();

        Auth::login($user);

        return view('perfil');
      }
    }
