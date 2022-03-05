<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    //
    public function transaksi(){
        $user = User::find(Auth::user()->id);
        $cekTransaksi = $user->trans()->get()->sortDesc();
        return view('frontend.user.transaksi',['tipe'=> $cekTransaksi]);
    }

    public function profil(){
        return view('frontend.user.profil');
    }

    public function invoice($id){
        $data = Transaction::where('users_id',Auth::user()->id)->where('id',$id)->firstOrFail();
        // dd($data);
        // dd($data->bank()->get());
        return view('frontend.content.step.uploadBuktiPembayaran',compact('data'));
    }
}
