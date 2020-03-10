<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class TypeController extends Controller
{
    public function index()
    {
        $types = App\Type::all();
        return $types;
    }
}
