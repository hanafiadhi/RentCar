<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fitur;

class fiturMobilController extends Controller
{
    public function index(){
        return view('backend.content.fiturCar.index',['fitur'=>Fitur::all()]);
    }

    public function create(){
        return view('backend.content.fiturCar.create');
    }

    public function store(Request $request){
        $request->validate(['nama_fitur'=>'required|min:3|max:10']);
        Fitur::create($request->all());
        return redirect('/fitur-mobil')->with('success','Fitur '.$request->nama_fitur.' berhasil di input');
    }

    public function edit($id){
        $data = Fitur::findOrFail($id);
        return view('backend.content.fiturCar.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $data = Fitur::findOrFail($id);
        $request->validate(['nama_fitur'=>'required|min:3|max:10']);
        $data->update($request->all());
        return redirect('/fitur-mobil')->with('success','Fitur '.$request->nama_fitur.' berhasil di update');
    }

    public function destroy($id){
        $data = Fitur::findOrFail($id);
        $data->delete();
        return redirect('/fitur-mobil')->with('success','Fitur '.$data->nama_fitur.' berhasil di delete');
    }
}
