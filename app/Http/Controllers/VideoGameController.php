<?php

namespace App\Http\Controllers;

use App\Models\VideoGame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VideoGameController extends Controller
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
        //get current user id from session
        $currUserId = Auth::user()->email;
        $data = VideoGame::get()->where('userId', $currUserId);
        return view('videoGames.index', compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('videoGames.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'rating' => 'required',
            'genre' => 'required',
            'userId' => 'required',
            'imgUrl' => 'required'
        ]);

        $data = $request->all();
        // $data['userId'] = Auth::user()->email;
        VideoGame::create($data);
        return redirect()->route('videoGames.index')->with('success', 'Game created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VideoGame  $videoGame
     * @return \Illuminate\Http\Response
     */
    public function show(VideoGame $videoGame)
    {
        return view('videoGames.show', compact('videoGame'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VideoGame  $videoGame
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoGame $videoGame)
    {
        return view('videoGames.edit', compact('videoGame'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoGame  $videoGame
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoGame $videoGame)
    {
        $request->validate([
            'title' => 'required',
            'rating' => 'required',
            'genre' => 'required',
            'userId' => 'required',
            'imgUrl' => 'required'
        ]);

        VideoGame::where('id', $videoGame->id)->update( $request->except(['_token', '_method']));


        return redirect()->route('videoGames.index')->with('success', 'Game updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoGame  $videoGame
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoGame $videoGame)
    {
        $videoGame->delete();
        return redirect()->route('videoGames.index')->with('success', 'Game deleted successfully.');
    }
}
