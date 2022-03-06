<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\website;
use Illuminate\Support\Facades\Storage;
class settingController extends Controller
{
    public function index(){
        return view('backend.content.website.index',['data'=>Website::all()]);
    }

    public function store(Request $request,$id = 1){
        // dd($request->all());
        $data = website::find($id);
        if ($data ==  null) {
            # code...
            $request->validate([
            'app_name'=>'required',
            'site_desciption'=>'required',
            'Logo'=> 'required|image|mimes:jpg,png,jpeg|max:1024',
            'favicon'=> 'required|image|mimes:jpg,png,jpeg|max:1024'
        ]   );
            if(request()->file('Logo')) {
            # code...
                $name = uniqid();
                $logo = request()->file('Logo');
                $logoUrl = $logo->storeAs("image/setting","{$name}.{$logo->extension()}");
            }
            if (request()->file('favicon')) {
            # code...
                $name = uniqid();
                $favicon = request()->file('favicon');
                $faviconUrl = $favicon->storeAs("image/setting","{$name}.{$favicon->extension()}");
            }
            website::create([
                'app_name'=> $request->app_name,
                'site_desciption'=> $request->site_desciption,
                'Logo'=> $logoUrl,
                'favicon'=> $faviconUrl
            ]);
            return redirect('/setting')->with('success','Pembaharuan Berhasil');
        }elseif ($data != null) {
            # code...
            $request->validate([
            'app_name'=>'required',
            'site_desciption'=>'required',
            'Logo'=> 'image|mimes:jpg,png,jpeg|max:1024',
            'favicon'=> 'image|mimes:jpg,png,jpeg|max:1024'
            ]);
            if (request()->file('Logo')) {
                # code...
                Storage::delete($data->Logo);
                $name = uniqid();
                $logo = request()->file('Logo');
                $logoUrl = $logo->storeAs("image/setting","{$name}.{$logo->extension()}");
            }else{
                $logoUrl = $data->Logo;
            }
            if (request()->file('favicon')) {
                # code...
                Storage::delete($data->favicon);
                $name = uniqid();
                $favicon = request()->file('favicon');
                $faviconUrl = $favicon->storeAs("image/setting","{$name}.{$favicon->extension()}");
            }else{
                $faviconUrl = $data->favicon;
            }
            $data->update([
                'app_name'=> $request->app_name,
                'site_desciption'=> $request->site_desciption,
                'Logo'=> $logoUrl,
                'favicon'=> $faviconUrl
            ]);
            return redirect('/setting')->with('success','Pembaharuan Update');
        }
    }
}
