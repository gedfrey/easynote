<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;


class AlignController extends Controller
{
    public function index()
    {
        $aligns = App\Align::all();
        return $aligns;
    }
}
