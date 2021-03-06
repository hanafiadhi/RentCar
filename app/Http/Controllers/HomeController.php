<?php

namespace App\Http\Controllers;

use App\{Bank, User,car,Fitur, Transaction, type};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.content.pageone',[
            'User'=> User::Role('user')->count(),
            'Car'=> car::count(),
            'Fitur'=> Fitur::count(),
            'tipe'=> type::count(),
            'bank' => Bank::count(),
            'transaksi'=> Transaction::count()
        ]);
    }
    public function profil()
    {
        return view('backend.content.profil.edit');
    }
    
}
