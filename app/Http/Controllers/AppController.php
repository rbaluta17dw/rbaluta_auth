<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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

  public function enviarmensaje()
  {
    return view('mensaje');
  }

  public function perfil()
  {
    return view('perfil');
  }

  public function cambio(Request $request)
  {
    $name = $request->input('name');
    $email = $request->input('email');
    $passwordold = $request->input('passwordold');
    $passwordnew = $request->input('passwordnew');

    $user = User::where('name', $name)
              ->update(['name' => $name, 'email' => $email]);

    return view('perfil');
  }
}
