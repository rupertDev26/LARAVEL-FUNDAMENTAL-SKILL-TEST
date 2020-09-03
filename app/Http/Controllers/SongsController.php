<?php

namespace App\Http\Controllers;

use App\Songs;
use Illuminate\Http\Request;

class SongsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $song = Songs::latest()->where('status', 0)->get();

        return view('songs.index', [ 'songs' => $song ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('songs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       request()->validate([
            'title' => 'required',
            'artist' => 'required',
            'lyrics' => 'required',
        ]);

        $songs = new Songs();

        $songs->title = request('title');
        $songs->artists = request('artist');
        $songs->lyrics = request('lyrics');
        $songs->status = 0;
        $songs->published_at = date('Y-m-d H:i:s');

        $songs->save();

        return redirect('/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $song = Songs::find($id);

        return view('songs.show', [ 'songs' => $song ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $song = Songs::find($id);

        return view('songs.edit', compact('song'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $song = Songs::find($id);

        $song->title = request('title');
        $song->artists = request('artist');
        $song->lyrics = request('lyrics');

        $song->save();

        return redirect('/show/'. $song->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $song = Songs::find($id);

        $song->status = 1;

        $song->save();

        return redirect('/show/'. $song->id);
    }
}
