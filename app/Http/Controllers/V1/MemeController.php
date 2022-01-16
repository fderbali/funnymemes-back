<?php

namespace App\Http\Controllers\V1;

use App\Models\Meme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemeController extends Controller
{

    /**
     * Create a new MemeController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index', 'show', 'likes', 'comments']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Meme::paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $meme = new Meme();
        $meme->url = $request->url;
        $meme->user_id = auth()->user()->id;
        $meme->save();
        return $meme;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meme  $meme
     * @return \Illuminate\Http\Response
     */
    public function show(Meme $meme)
    {
        return $meme;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meme  $meme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meme $meme)
    {
        $meme->update($request->all());
        return $meme;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meme  $meme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meme $meme)
    {
        $meme->delete();
    }

    public function likes(Meme $meme){

        return $meme->likes;
    }

}
