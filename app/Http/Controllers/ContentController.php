<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Validator;


class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = App\Content::all();
        return $contents;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newContent = new App\Content;
        $newContent->order = $request->order;
        $newContent->value = $request->value;
        $newContent->post_id = $request->post_id;
        $newContent->type_id = $request->type_id;
        $newContent->property_id = $request->property_id;
        $newContent->save();

        return $newContent;
    }

    public function create_content($content,$property_id)
    {
        $newContent = new App\Content;
        $newContent->order = $content['order'];
        $newContent->value = $content['value'];
        $newContent->post_id = $content['post_id'];
        $newContent->type_id = $content['type_id'];
        $newContent->property_id = $property_id;
        $newContent->save();

        return $newContent;
    }

    public function createContent($content)
    {
//        $request->validate([
//            'order' => 'required',
//            'post_id' => 'required|exists:posts',
//            'type_id' => 'required|exists:types',
//            'property' => 'required|array',
//            'value' => 'required|min:10'
//        ]);

        $properties = new PropertyController();
        $property = $properties->store($content['property']);

        $content = $this->create_content($content,$property->id);
        return $content;

    }

    public function createContents(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'contents' => 'required|array',
            'contents.*.order' => 'required',
            'contents.*.post_id' => 'required|exists:posts,id',
            'contents.*.type_id' => 'required|exists:types,id',
            'contents.*.value' => 'required|min:4'
        ]);

        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->all()]);

        }

//        return 'hola mundo';
//        return $request->contents[0]['property'];
//
        foreach ($request->contents as $content)
        {
            $this->createContent($content);
        }

        return 'Creado Correctamente';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = App\Content::findOrFail($id);
        return $content;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = App\Content::findOrFail($id);
        $content->delete();
        return $id;
    }

    public function success($post_id)
    {
        return view('contents.success',compact($post_id));
    }
}
