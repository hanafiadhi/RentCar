<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
use Illuminate\Support\Facades\Storage;
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
            'gambar'=>'required|image|mimes:jpg,png,jpeg|max:2048',
            'nama_bank'=>'required|min:3|max:20',
            'atas_nama'=>'required|min:3|max:50',
            'norek'=>'required|min:8|max:50'
        ]);
        $data = $request->all();
        $name = uniqid();
        $thumbnail = request()->file('gambar');
        $thumbnailURL = $thumbnail->storeAs("image/bank","{$name}.{$thumbnail->extension()}");
        $data['gambar']= $thumbnailURL;
        Bank::create($data);
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
       if (request()->file('gambar')) {
            # code...
            Storage::delete($data->gambar);
            $name = uniqid();
            $thumbnail = request()->file('gambar');
            $thumbnailURL = $thumbnail->storeAs("image/bank","{$name}.{$thumbnail->extension()}");
        }else{
            $thumbnailURL = $data->gambar;
        }
        $Req = $request->all();
        $Req['gambar'] = $thumbnailURL;
        $data->update($Req);
        return redirect('/bank-payment')->with('success','data Berhasil di update');
    }

    public function destroy($id){
        $data = Bank::findOrFail($id);
        $data->delete();
        Storage::delete($data->gambar);
        return redirect('/bank-payment')->with('success','data Berhasil di Hapus');
    }
}
