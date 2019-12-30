<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;


class ContentsEditController extends Controller
{
    public function edit($id){
        return view('contents.edit',compact('id'));
    }

    public function listById($id){
        $contents = App\Content::where('post_id',$id)
            ->orderBy('order','asc')
            ->get();
        return $contents;
    }

    public function getOrder($id){
        $order = App\Content::where('post_id',$id)
        ->orderBy('order','desc')
        ->take(1)
        ->get();
        return $order;
    }

    public function up(Request $request){
        $contents = App\Content::where('post_id',$request->post_id)
            ->orderBy('order','asc')
            ->get();

        $content = App\Content::findOrFail($request->content_id);
        for($x = $content->order;$x >= 1;$x--){
            $value = App\Content::where([
                'post_id' => $request->post_id,
                'order' => $x -1
            ])->get();
            if(count($value) != 0){
                $order = $value[0]->order;
                $value[0]->order = $content->order;
                $value[0]->save();
                $content->order = $order;
                $content->save();
                return $content;
            }
        }
    }

    public function down(Request $request){


        $contents = App\Content::where('post_id',$request->post_id)
            ->orderBy('order','asc')
            ->get();
        $length = count($contents);


        $content = App\Content::find($request->content_id);

        for($x = $content->order;$x <= $length ;$x++){
            $value = App\Content::where('post_id',$request->post_id)
                ->where('order',$x + 1)
                ->get();
            if(count($value)){
                $order = $value[0]->order;
                $value[0]->order = $content->order;
                $value[0]->save();
                $content->order = $order;
                $content->save();
                return $content;
            }
        }

    }
}
