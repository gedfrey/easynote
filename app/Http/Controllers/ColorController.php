<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ColorController extends Controller
{
    public function index(){
        $colors = App\Color::all();
        return $colors;
    }
}
