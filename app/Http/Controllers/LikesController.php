<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB ;
use App\Likes ;
class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function check_like($user_id , $tweet_id)
    {
        $like = Likes::where('user_id' , '=' , $user_id)->where('tweets_id' , '=' , $tweet_id)->get() ;
        if(count($like) > 0){
            $like->first()->liked = !$like->first()->liked ;
            $like->first()->save();
            return $like->first()->liked ;
        }
        else {
            $new_like = new Likes ;
            $new_like->user_id = $user_id ;
            $new_like->tweets_id = $tweet_id ;
            $new_like->liked = true ;
            $new_like->save();
            return $new_like->liked;
        }
    }
    public function color($user_id , $tweet_id)
    {
        $like = Likes::where('user_id' , '=' , $user_id)->where('tweets_id' , '=' , $tweet_id)->get() ;
        if(count($like) > 0){
        return $like->first()->liked ;
        }
        else {
        return 0 ;
        }
    }

}