<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sosial;

class sosialMediaController extends Controller
{
    public function index(){
        
        return view('backend.content.sosial.index',[
            'sosial'=> Sosial::all()
        ]);
    }

    public function create(){
        return view('backend.content.sosial.create');
    }

    public function store(Request $request){
        $request->validate([
            'icon'=>'required',
            'url'=>'required',
            'nama'=>'required'
        ]);
        Sosial::create($request->all());
        return redirect('/sosial-media')->with('success','data berhasil di tambah');
    }

    public function edit($id){
        $data = Sosial::findOrFail($id);
        return view('backend.content.sosial.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $data = Sosial::findOrFail($id);
        $request->validate([
            'icon'=>'required',
            'url'=>'required',
            'nama'=>'required'
        ]);
        $data->update($request->all());
        return redirect('/sosial-media')->with('success','data berhasil di update');
    }

    public function destroy($id){
        $data = Sosial::findOrFail($id);
        $data->delete();
        return redirect('/sosial-media')->with('success','data berhasil di hapus');
    }
}
