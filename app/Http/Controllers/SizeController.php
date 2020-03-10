<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = App\Size::all();
        return $sizes;
    }
}
