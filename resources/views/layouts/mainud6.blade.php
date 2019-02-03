
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Zubiri Manteo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Autentification">
  <meta name="author" content="ajuanenama">
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />

  <link rel="shortcut icon" href="{{ asset("favicon.png") }}" type="image/png">
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ url("font-awesome/css/font-awesome.min.css") }}">
  <link rel="stylesheet" href="{{ asset("assets/css/main.css") }}">
  
</head>

<body>

  @include("elements.navbar")

  <main class="p-0">
    @yield("content")
  </main>

</body>
<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
</html>
