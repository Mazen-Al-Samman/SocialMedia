<?php

namespace App\Http\Controllers;

use App\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tweets = DB::select('select * from tweets where user_id = ' . auth()->User()->id);
        return view('home', ['tweets' => $tweets]);

    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.sp_user', ['user' => $user]);
    }

    public function edit($id)
    {
        if(auth()->user()->id == $id){
        return view('users.edit_profile')->with(['id' => $id]) ;
        }
        return redirect()->back();
    }

}