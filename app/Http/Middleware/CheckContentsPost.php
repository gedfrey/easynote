<?php

namespace App\Http\Middleware;

use App\Content;
use App\Post;
use Closure;

class CheckContentsPost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        dd($request->route('id'));
        $post_id = $request->route('id');
        $contents = Post::findorFail($post_id)->contents;
//        dd($contents);
        if(count($contents) > 0){
            return redirect()->route('post.contents.edit',$post_id);
        }
        return $next($request);
    }
}
