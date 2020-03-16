<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $posts = App\Post::where('user_id',Auth::id())->get();
        $edit = true;
        return view('home',compact('posts','edit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd('hola');
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
        $postCreate->user_id = Auth::id();
        $postCreate->save();
        $id = $postCreate->id;
//        return view('post.details',compact('post'));
//        return view('contents.create',compact('id'));
        return redirect()->route('post.contents.create',$id);
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
        $contentController = new ContentController();
        $contents = $contentController->getContentsProperty($id);
        return view('post.details',compact('post','contents'));
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
        foreach($postDelete->contents as $content){
            $content->property->delete();
        }
        $postDelete->delete();
        $posts = App\Post::all();
        $edit = false;
        return view('home',compact('posts','edit'));
    }

    public function view($id)
    {
        $contentController = new ContentController();
        $contents = $contentController->getContentsProperty($id);

        return view('post.view',compact('contents'));
    }
}
