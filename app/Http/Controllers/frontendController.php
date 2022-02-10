<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index(){
        return view('frontend.content.home');
    }

    public function car(){
        return view('frontend.content.listMobil');
    }

    public function carDetails(){
        return view('frontend.content.detailMobil');
    }

    public function stepOne(){
        return view('frontend.content.step.tanggal');
    }
    public function stepTwo(){
        return view('frontend.content.step.DT');
    }
    public function step3(){
        return view('frontend.content.step.uploadBuktiPembayaran');
    }
    
}
