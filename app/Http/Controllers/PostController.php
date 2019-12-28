<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = App\Post::all();
        return view('home',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return view('home');
        $request->validate([
           'title' => 'required|max:255',
            'description' => 'required'
        ]);

        $postCreate = new App\Post;
        $postCreate->title = $request->title;
        $postCreate->description = $request->description;
        $postCreate->save();
        $post = $postCreate;
        return view('post.details',compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = App\Post::findOrFail($id);
        return view('post.details',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = App\Post::findOrFail($id);
        return view('post.edit',compact('post'));
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
        $request->validate([
            'title'=>'required|max:255',
            'description'=>'required'
        ]);

        $post = App\Post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return view('post.details',compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postDelete = App\Post::findOrFail($id);
        $postDelete->delete();
        $posts = App\Post::all();
        return view('home',compact('posts'));
    }
}
