<?php

namespace App\Http\Middleware;

use App;
use Closure;

class CheckUserOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public static function validateUser($post_id){
        $post = App\Post::findorFail($post_id);
        if(isset($post->user_id)){
            if($post->user_id != auth()->user()->id){
                return true;
            }

            return false;
        }
    }

    public function handle($request, Closure $next)
    {

//        dd($request->route()->parameters());

        $errors = [];

        if(isset($request->route()->parameters()['id'])){
            $post_id = $request->route()->parameters()['id'];
            if(self::validateUser($post_id)){
                array_push($errors,true);
            }
        }

        if(isset($request->route()->parameters()['content'])){

            $content_id = $request->route()->parameters()['content'];
            $content = App\Content::findorFail($content_id);
            if(self::validateUser($content->post_id)){
                array_push($errors,true);
            }
        }

        if(isset($request->route()->parameters()['post'])){

            $post_id = $request->route()->parameters()['post'];
            if(self::validateUser($post_id)){
                array_push($errors,true);
            }

        }

        foreach($errors as $error){
            if($error){
                return redirect()->route('error-owner');
            }
        }
//        $params = $request->route()->parameters()['post'];

        return $next($request);
    }
}
