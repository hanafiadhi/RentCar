<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\website;
use Illuminate\Support\Facades\File;
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
            ]);
            if($logo = request()->file('Logo')) {
                # code...
                    $destinationPath = 'webset/';
                    $Image = uniqid(). "." . $logo->getClientOriginalExtension();
                    $logo->move($destinationPath, $Image);
                    $logoUrl = "$Image";
                }
            
            if ($favicon = request()->file('favicon')) {
            # code...
                $destinationPath = 'webset/';
                $Namefavico = date('YmdHis'). "." . $favicon->getClientOriginalExtension();
                $favicon->move($destinationPath, $Namefavico);
                $faviconUrl = "$Namefavico";
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
            if($logo = request()->file('Logo')) {
                # code...
                if(File::exists(public_path('/webset/'.$data->Logo))) {
                    File::delete(public_path('/webset/'.$data->Logo));
                    // dd('ada');
                }
                    $destinationPath = 'webset/';
                    $Image = uniqid(). "." . $logo->getClientOriginalExtension();
                    $logo->move($destinationPath, $Image);
                    $logoUrl = "$Image";
                }
            else{
                $logoUrl = $data->Logo;
            }
            if ($favicon = request()->file('favicon')) {
            # code...
                if(File::exists(public_path('/webset/'.$data->favicon))) {
                    File::delete(public_path('/webset/'.$data->favicon));
                        // dd('ada');
                }
                $destinationPath = 'webset/';
                $Namefavico = date('YmdHis'). "." . $favicon->getClientOriginalExtension();
                $favicon->move($destinationPath, $Namefavico);
                $faviconUrl = "$Namefavico";
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
