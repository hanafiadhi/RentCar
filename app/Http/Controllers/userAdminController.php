<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userAdminController extends Controller
{
    public function index(){
        return view('backend.content.admin.index',['admin'=> User::Role('admin')->get() ]);
    }

    public function editPassword(Request $request){
        $request->validate([
                'password' => 'required|confirmed|min:8',
                'old_password'=> 'required'
        ]);
        $old_password = request('old_password');
        $current_password = auth()->user()->password;
        if (Hash::check($old_password,$current_password)) {
            # code...
            $data = User::findOrFail(auth()->user()->id);
            $data->update([
                'password'=> bcrypt(request('password'))
            ]);
            return redirect()->back()->with('success','Password Berhasil di ubah');
        }else{
            return back()->withErrors(['old_password'=>'Pastikan password anda Benar']);
        }
    }
    public function editNama(Request $request){
            $request->validate([
                'name' => 'required|min:3',
                'username'=> 'required|min:5|max:50'
            ]);
            $data = User::findOrFail(Auth::user()->id);
            if ($request->username != $data->username) {
                # code...
                $check = User::where('username',$request->username)->first();
                if ($check != null) {
                    # code...
                    return back()->withErrors(['username'=>'Username sudah Digunakan']);
                }else{
                    $username = $request->username;
                }
            }else{
                $username = $request->username;
            }
            $data->update([
                'name'=> $request->name,
                'username'=> $username
            ]);
            return redirect()->back()->with('success','Data Berhasil di ubah');
    }
}
