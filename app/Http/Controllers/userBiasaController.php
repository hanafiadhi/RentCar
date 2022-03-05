<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
class userBiasaController extends Controller
{
    public function index(){
        return view('backend.content.user.index',['admin'=> User::Role('user')->get() ]);
    }
    public function details($id){
        return view('backend.content.user.details',['admin'=> User::findOrFail($id)]);
    }
    
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->removeRole('user');
        $user->delete();
        return redirect('/user-biasa')->with('success','Fitur '.$user->name.' berhasil di delete');
    }
}
