<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\car;
use App\type;

use function PHPSTORM_META\type;

class frontendController extends Controller
{
    public function index(){
        return view('frontend.content.home');
    }

    public function car(){
        return view('frontend.content.listMobil',['car'=> car::where('status','ready')->get()]);
    }

    public function carDetails(Request $request, $id){

        $cek = car::where('status','ready')->where('id',$id)->first();
        if ($cek== null) {
            # code...
            return redirect()->back();
        }
        return view('frontend.content.detailMobil',compact('cek'));
    }

    public function cartype($id){
        $data = type::findOrFail($id);
        return view('frontend.content.listMobil',
        [
            'car'=> $data->cars()->get(),
            'message'=> $data->nama_tipe
        ]);
    }
}
