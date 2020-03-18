<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $posts = App\Post::orderBy('id','DESC')->get();
        $edit = false;
        return view('home',compact('posts','edit'));
    }

    public function approval()
    {
        return view('register.approval');
    }
}
