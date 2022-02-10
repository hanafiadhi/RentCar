<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class userBiasaController extends Controller
{
    public function index(){
        return view('backend.content.user.index',['admin'=> User::Role('user')->get() ]);
    }
    public function details($id){
        return view('backend.content.user.details',['admin'=> User::findOrFail($id)]);
    }
}
