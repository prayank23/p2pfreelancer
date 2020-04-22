<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoingateController extends Controller
{
    public function index()
    {
        return view('coingate.index');
    }
}
