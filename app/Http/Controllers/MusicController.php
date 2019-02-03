<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Music;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musics = Music::all();
        return view('music', [ 'musics' => $musics ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addMusic');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
          'title' => 'required|unique:musics|max:20',
          'album' => 'required|max:20',
          'author' => 'required|email|max:40',
          'category' => 'required|min:1|max:20',
          'release_year' => 'required'
        ]);
        $music = new Music;
        $music->title = $request->input('title');
        $music->album = $request->input('album');
        $music->author = $request->input('author');
        $music->category = $request->input('category');
        $music->release_year = $request->input('release_year');
        $music->save();
        $musics = Music::all();
        return view('music', [ 'musics' => $musics ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $music = Music::find($id);
      return view('music', [ 'music' => $music ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $music = Music::find($id);
      return view('addMusic', ['music' => $music]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validatedData = $request->validate([
        'title' => 'required|max:20',
        'album' => 'required|max:20',
        'author' => 'required|email|max:40',
        'category' => 'required|min:1|max:20',
        'release_year' => 'required'
      ]);
      $music = Music::find($id);
      $music->title = $request->input('title');
      $music->album = $request->input('album');
      $music->author = $request->input('author');
      $music->category = $request->input('category');
      $music->release_year = $request->input('release_year');
      $music->save();
      $musics = Music::all();
      return view('music', [ 'musics' => $musics ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $music = Music::destroy($id);
        $musics = Music::all();
        return view('music', [ 'musics' => $musics ]);
    }
}
