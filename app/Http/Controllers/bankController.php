<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class bankController extends Controller
{
    public function index(){
        $bank = Bank::all();
        return view('backend.content.Banks.index',compact('bank'));
    }

    public function create(){
        return view('backend.content.Banks.create');
    }

    public function store(Request $request){
        $request->validate([
            'gambar'=>'required|image|mimes:jpg,png,jpeg|max:2048',
            'nama_bank'=>'required|min:3|max:20',
            'atas_nama'=>'required|min:3|max:50',
            'norek'=>'required|min:8|max:50'
        ]);
        $data = $request->all();
        if ($image = $request->file('gambar')) {
            $destinationPath = 'bank/';
            $BankImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $BankImage);
            $thumbnailbank = "$BankImage";
        }
        $data['gambar']= $thumbnailbank;
        Bank::create($data);
        return redirect('/bank-payment')->with('success','data Berhasil di input');
    }

    public function edit($id){
        $data = Bank::findOrFail($id);
        return view('backend.content.Banks.edit',compact('data'));
    }

    public function update(Request $request,$id){
        $data = Bank::findOrFail($id);
        $request->validate([
            'nama_bank'=>'required|min:3|max:20',
            'atas_nama'=>'required|min:3|max:50',
            'norek'=>'required|min:8|max:50',
            'gambar'=>'image|mimes:jpg,png,jpeg|max:2048'
        ]);
        if ($image = $request->file('gambar')) {
            $destinationPath = 'bank/';
            $BankImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            if($a = File::exists(public_path('bank/'.$data->gambar))) {
                File::delete(public_path('/bank/'.$data->gambar));
            }
            $image->move($destinationPath, $BankImage);
            $thumbnailbank = "$BankImage";
        }else{
            $thumbnailbank = $data->gambar;
        }
        $Req = $request->all();
        $Req['gambar'] = $thumbnailbank;
        $data->update($Req);
        return redirect('/bank-payment')->with('success','data Berhasil di update');
    }

    public function destroy($id){
        $data = Bank::findOrFail($id);
        $data->delete();
        if(File::exists(public_path('bank/'.$data->gambar))) {
            File::delete(public_path('bank/'.$data->gambar));
        }
        return redirect('/bank-payment')->with('success','data Berhasil di Hapus');
    }
}
