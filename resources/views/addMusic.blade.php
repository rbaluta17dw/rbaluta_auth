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

                    @if (isset($music))
                      <form class="col-4" action="{{ route('music.update', ['id' => $music->id]) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{$music->title}}">
                        <label for="album">Album</label>
                        <input type="text" name="album" value="{{$music->album}}">
                        <label for="author">Author</label>
                        <input type="email" name="author" value="{{$music->author}}">
                        <label for="category">Category</label>
                        <input type="number" name="category" value="{{$music->category}}">
                        <label for="release_year">Release Year</label>
                        <input type="number" name="release_year" value="{{$music->release_year}}">
                        <input type="submit" name="edit" value="Editar">
                      </form>
                    @else
                      <form class="col-4" action="{{ route('music.store') }}" method="post">
                        @csrf
                        <label for="title">Title</label>
                        <input type="text" name="title" value="">
                        <label for="album">Album</label>
                        <input type="text" name="album" value="">
                        <label for="author">Author</label>
                        <input type="email" name="author" value="">
                        <label for="category">Category</label>
                        <input type="number" name="category" value="">
                        <label for="release_year">Release Year</label>
                        <input type="number" name="release_year" value="">
                        <input type="submit" name="add" value="Añadir">
                      </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
