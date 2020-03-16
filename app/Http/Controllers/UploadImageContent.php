<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadImageContent extends Controller
{
    public function upload(Request $request){
//        return $request;
        $path = $request->file('image')->store('tmps','public');
        return $path;
    }


    public function destroy($value)
    {
        Storage::disk('public')->delete(value);
    }

    public function store(Request $request)
    {
        $old = $request->value;
        $split = explode("/",$old);
        $new_url = 'post/'.$request->post_id.'/'.$split[1];
        Storage::disk('public')->move($old,$new_url);
        return $new_url;
    }

}
