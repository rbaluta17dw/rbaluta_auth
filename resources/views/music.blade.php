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
            @if (isset($musics))
              <table class="col-12" border="1">
                <th>Title</th>
                <th>Album</th>
                <th>Author</th>
                <th>Category</th>
                <th>Release Year</th>
                @foreach ($musics as $music)
                  <tr>
                    <td><a href="/music/{{$music->id}}">{{$music->title}}</a></td>
                    <td>{{$music->album}}</td>
                    <td>{{$music->author}}</td>
                    <td>{{$music->category}}</td>
                    <td>{{$music->release_year}}</td>
                    <form class="" action="{{ route('music.edit', ['id' => $music->id]) }}" method="get">
                      <td>
                        <input type="submit" name="update" value="editar">
                      </td>
                    </form>
                    <form class="" action="{{ route('music.destroy', ['id' => $music->id]) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <td>
                        <input type="submit" name="delete" value="eliminar">
                      </td>
                    </form>
                  </tr>
                @endforeach
              </table>
            @elseif (isset($music))
              <div class="col-12">
                <h1>Title:</h1>
                <h1>{{$music->title}}</h1>
                <h2>Album:</h2>
                <h2>{{$music->album}}</h2>
                <p>Author:</p>
                <p>{{$music->author}}</p>
                <p>Category:</p>
                <p>{{$music->category}}</p>
                <p>Release Year:</p>
                <p>{{$music->release_year}}</p>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
