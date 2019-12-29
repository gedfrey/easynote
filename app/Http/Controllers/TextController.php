<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class TextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $newText = new App\Text;
        $newText->value = $request->value;
        $newText->size = $request->size;
        $newText->align = $request->align;
        $newText->type_text_id = $request->type_text_id;
        $newText->save();

        return $newText;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $newText = App\Text::findOrFail($id);
        return $newText;
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
        $updateText = App\Text::findOrFail($id);
        $updateText->value = $request->value;
        $updateText->size = $request->size;
        $updateText->align = $request->align;
        $updateText->type_text_id = $request->type_text_id;
        $updateText->save();

        return $updateText;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
