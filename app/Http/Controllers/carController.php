<?php

namespace App\Http\Controllers;

use App\car;
use App\Fitur;
use App\type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class carController extends Controller
{
    public function index(){
        return view('backend.content.car.index',['data'=> car::all()]);
    }

    public function create(){
        return view('backend.content.car.create',['tipe' => type::all(),'fitur'=>Fitur::all()]);
    }

    public function store(Request $request){
        $request->validate([
            'nama_mobil'=>'required|min:4|max:100',
            'bagasi' => 'required|integer|min:1|max:10',
            'tempat_duduk'=> 'required|integer|min:1|max:10',
            'harga'=> 'required|numeric|between:50000,1000000',
            'denda'=> 'required|numeric|between:50000,1000000',
            'description'=> 'required|min:10',
            'status'=> 'required|in:ready,tidak',
            'sopir'=>'required|in:ready,tidak',
            'transmisi'=>'required|in:manual,semi-otomatis,otomatis',
            'type_id'=> 'required|integer',
            'gambar'=> 'required|image|mimes:jpg,png,jpeg|max:2048',
            'fitur'=> 'array|required',
        ]);
        $data = $request->all();
        // $name = uniqid();
        // $thumbnail = request()->file('gambar');
        // $thumbnailURL = $thumbnail->storeAs("image/mobil","{$name}.{$thumbnail->extension()}");
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $thumbnailURL = "$profileImage";
        }
        $data['gambar']= $thumbnailURL;
        $create = car::create($data);
        $create->fiturs()->attach(request('fitur'));
        return redirect('/data-mobil')->with('success','Data mobil Berhasil di Tambah');
    }

    public function edit($id){
        $data = car::findOrFail($id);
        $tipe = type::all();
        $fitur = Fitur::all();
        return view('backend.content.car.edit',compact('data','tipe','fitur'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'nama_mobil'=>'required|min:4|max:100',
            'bagasi' => 'required|integer|min:1|max:10',
            'tempat_duduk'=> 'required|integer|min:1|max:10',
            'harga'=> 'required|numeric|between:50000,1000000',
            'denda'=> 'required|numeric|between:50000,1000000',
            'description'=> 'required|min:10',
            'status'=> 'required|in:ready,tidak',
            'sopir'=>'required|in:ready,tidak',
            'transmisi'=>'required|in:manual,semi-otomatis,otomatis',
            'type_id'=> 'required|integer',
            'gambar'=> 'image|mimes:jpg,png,jpeg|max:2048',
            'fitur'=> 'array|required',
        ]);
        $data = car::findOrFail($id);
        if (request()->file('gambar')) {
            # code...
            Storage::delete($data->gambar);
            $name = uniqid();
            $thumbnail = request()->file('gambar');
            $thumbnailURL = $thumbnail->storeAs("image/mobil","{$name}.{$thumbnail->extension()}");
        }else{
            $thumbnailURL = $data->gambar;
        }
        $Req = $request->all();
        $Req['gambar'] = $thumbnailURL;
        $data->update($Req);
        $data->fiturs()->sync(request('fitur'));
        return redirect('/data-mobil')->with('success','Data mobil Berhasil di Update');
    }

    public function destroy($id){
        $data = car::findOrFail($id);
        Storage::delete($data->gambar);
        $data->fiturs()->detach();
        $data->delete($id);
        return redirect('/data-mobil')->with('success','Data mobil Berhasil di Hapus');
    }
}
