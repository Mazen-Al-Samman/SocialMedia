<?php

namespace App\Http\Controllers;

use App\Tweets;
use DB;
use Illuminate\Http\Request;


class TweetsController extends Controller
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
        // $tweets = Tweets::all();
        $tweets = DB::table('tweets')
            ->join('users', 'tweets.user_id', '=', 'users.id')
            ->select('tweets.*', 'users.name')
            ->get();
        return view('tweets.tweet_show', [
            'tweets' => $tweets,
        ]);
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
        request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $img_name = '';
        if ($request->hasFile('img')) {
            $file = $request->file('img')->getClientOriginalName();
            $request->file('img')->storeAs('public/images', $file);
            $img_name = $file;
        } else {
            $img_name = 'noimg.jpg';
        }
        $tweet = new Tweets();
        $tweet->title = $request->input('title');
        $tweet->body = $request->input('body');
        $tweet->img = $img_name;
        $tweet->user_id = auth()->User()->id;
        $tweet->save();
        return redirect('/tweets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tweet = Tweets::find($id);
        return view('tweets.comments', [
            'tweets' => $tweet,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tweet = Tweets::find($id);
        if(auth()->user()->id == $tweet->user->id){
        return view('tweets.edit')->with('tweet', $tweet);
        } else {
            return redirect()->back();
        }
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
        request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $img_name = '';
        if ($request->hasFile('img')) {
            $file = $request->file('img')->getClientOriginalName();
            $request->file('img')->storeAs('public/images', $file);
            $img_name = $file;
        }
        $tweet = Tweets::find($id);
        $tweet->title = $request->input('title');
        $tweet->body = $request->input('body');
        if ($img_name != '') {
            $tweet->img = $img_name;
        }
        $tweet->save();
        return redirect('/tweets');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tweet = Tweets::find($id);
        $tweet->delete();
        return redirect('/tweets');
    }
}