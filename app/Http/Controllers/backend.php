<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class backend extends Controller
{
    public function index()
    {
        return view('backend.content.pageone');
    }
    public function tipeCar()
    {
        return view('backend.content.tipeCar');
    }
}
