<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function index($id){

//        $comments = Post::findorFail($id)->comments->with('user');
        $comments = Comment::where('post_id',$id)->with('user')->get();
        return $comments;
    }

    public function store($comment)
    {
        $new_comment = new Comment;
        $new_comment->value = $comment->value;
        $new_comment->user_id = auth()->user()->id;
        $new_comment->post_id = $comment->post_id;
        $new_comment->save();
        return $new_comment;
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'value' => 'required',
//            'user_id' => 'required|exists:users,id'
            'post_id' => 'required|exists:posts,id'
        ]);


        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->all()],400);
        }

//        return $request;

        return $this->store($request);
    }
}
