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
}
