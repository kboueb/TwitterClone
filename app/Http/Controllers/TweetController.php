<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tweets = Tweet::latest()->paginate(10);
        return view('tweets.index', compact('tweets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tweets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>'required | min:10, max:20',
            'content' =>'required | min:20',
        ]);

        $tweet = new Tweet;
        $tweet->title = $request->input('title');
        $tweet->content = $request->input('content');
        $tweet->user_id = auth()->user()->id;
        $tweet->save();

        $home_page = '/tweet';

        return redirect($home_page)->with('success','Tweet publié avec succès');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tweet = Tweet::find($id);
        return view('tweets.show', compact('tweet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tweet = Tweet::find($id);
        return view('tweets.edit', compact('tweet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' =>'required | min:10, max:20',
            'content' =>'required | min:20',
        ]);

        $tweet = Tweet::find($id);
        $tweet->title = $request->input('title');
        $tweet->content = $request->input('content');
        $tweet->user_id = auth()->user()->id;
        $tweet->save();

        $home_page = '/tweet';

        return redirect($home_page)->with('success','Tweet modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tweet = Tweet::find($id);
        $tweet->delete();
        return redirect('/tweet')->with('success', 'Tweet supprimé avec succès');
    }

}
