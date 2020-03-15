<?php

namespace App\Http\Controllers;

use App\Rules\PostUserOwnership;
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
            'contents.*.post_id' => ['required','exists:posts,id',new PostUserOwnership()],
            'contents.*.type_id' => 'required|exists:types,id',
            'contents.*.value' => 'required|min:4'
        ]);


        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->all()],400);

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

    public function destroyList(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'contents' => 'required|array',
            'contents.*.id' => 'required|exists:contents,id'
        ]);

        if($validator->fails()){
//            return response('error',404)->json(['error'=>$validator->errors()->all()]);
            return response('error validation',404);

        }
//
//        return $request->contents[0]['id'];

        foreach ($request->contents as $content)
        {

            $this->destroy($content['id']);
        }
        return response('Eliminados',200);
    }

    public function success($post_id)
    {
//        dd($post_id);
        return view('contents.success',compact('post_id'));
    }

    public function getContents($post_id)
    {
        return App\Content::with('property')->where('post_id',$post_id)->get();
    }

    public function getContentsProperty($post_id)
    {
        $contents = $this->getContents($post_id);

        foreach ($contents as $content){
            if(isset($content['property']['size_id'])){
                if($content['property']['size_id'] == 1){
                    $content['property']['size_id'] = "display-1";
                }else if($content['property']['size_id'] == 2){
                    $content['property']['size_id'] = "display-2";
                }else if($content['property']['size_id'] == 3){
                    $content['property']['size_id'] = "display-4";
                }else {
                    $content['property']['size_id'] = "display-4";
                }
            }

            if(isset($content['property']['align_id'])){
                if($content['property']['align_id'] == 1){
                    $content['property']['align_id'] = "text-center";
                }else if($content['property']['align_id'] == 2){
                    $content['property']['align_id'] = "text-left";
                }else if($content['property']['align_id'] == 3){
                    $content['property']['align_id'] = "text-right";
                }else if($content['property']['align_id'] == 4){
                    $content['property']['align_id'] = "text-justify";
                }else {
                    $content['property']['align_id'] = "text-left";
                }
            }

            if(isset($content['property']['color_id'])){
                if($content['property']['color_id'] == 1){
                    $content['property']['color_id'] = "red";
                }else if($content['property']['color_id'] == 2){
                    $content['property']['color_id'] = "black";
                }else if($content['property']['color_id'] == 3){
                    $content['property']['color_id'] = "blue";
                }else {
                    $content['property']['color_id'] = "black";
                }
            }

        }

        return $contents;

    }
}
