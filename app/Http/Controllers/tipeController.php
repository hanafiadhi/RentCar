<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\type;

class tipeController extends Controller
{
    public function index()
    {
        return view('backend.content.tipeCar.index',[
            'tipe'=> type::all()
        ]);
    }

    public function create()
    {
        return view('backend.content.tipeCar.create');
    }

    public function store(Request $request){
        $request->validate([
            'kode_tipe' => 'required|min:4|max:4',
            'nama_tipe' => 'required|min:3|max:10'
        ]);
        type::create($request->all());
        return redirect('/tipe-mobil')->with('success',' data '.$request->nama_tipe.' berhasil di input');
    }

    public function edit($id){
        $data = type::findOrFail($id);
        return view('backend.content.tipeCar.edit',compact('data'));
    }

    public function update(Request $request, $id){  
        $data = type::where('id',$id)->firstOrFail();
        $request->validate([
            'kode_tipe' => 'required|min:4|max:4',
            'nama_tipe' => 'required|min:3|max:10'
        ]);
        $data->update($request->all());
        return redirect('/tipe-mobil')->with('success',' data '.$request->nama_tipe.' berhasil di Update');
    }
    public function delete($id){
        $data = type::findOrFail($id);
        $data->delete();
        return redirect('/tipe-mobil')->with('success',' data '.$data->nama_tipe.' berhasil di Hapus');
    }
}
