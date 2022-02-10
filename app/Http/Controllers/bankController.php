<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;

class bankController extends Controller
{
    public function index(){
        return view('backend.content.bank.index',['bank' => Bank::all()]);
    }

    public function create(){
        return view('backend.content.bank.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama_bank'=>'required|min:3|max:20',
            'atas_nama'=>'required|min:3|max:50',
            'norek'=>'required|min:8|max:50'
        ]);
        Bank::create($request->all());
        return redirect('/bank-payment')->with('success','data Berhasil di input');
    }

    public function edit($id){
        $data = Bank::findOrFail($id);
        return view('backend.content.bank.edit',compact('data'));
    }

    public function update(Request $request,$id){
        $data = Bank::findOrFail($id);
        $request->validate([
            'nama_bank'=>'required|min:3|max:20',
            'atas_nama'=>'required|min:3|max:50',
            'norek'=>'required|min:8|max:50'
        ]);
        $data->update($request->all());
        return redirect('/bank-payment')->with('success','data Berhasil di update');
    }

    public function destroy($id){
        $data = Bank::findOrFail($id);
        $data->delete();
        return redirect('/bank-payment')->with('success','data Berhasil di Hapus');
    }
}
