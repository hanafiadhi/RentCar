<?php

namespace App\Http\Controllers;

use App\Bank;
use App\car;
use App\Mail\orderEmail;
use App\Transaction;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
class transaksiController extends Controller
{
    //
    public function stepTwo(Request $request){
        $todayDate = date('Y-m-d');
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'id' =>'required|integer',
            'start_date' => 'required|date|date_format:Y-m-d|after_or_equal:'.$todayDate,
            'end_date'=>'required|date|date_format:Y-m-d|after_or_equal:start_date',
        ]);
        if ($validator->fails()) {
                $request->session()->forget('data');
                return Redirect('/detail-mobil/'.$request->id)->withErrors($validator)->withInput();
            }
        $cekMobil = car::find($request->id);
        if($cekMobil == null){
            return redirect()->back();
        }

        $tgl1 = new DateTime($request->start_date);
        $tgl2 = new DateTime($request->end_date);
        $jarak = $tgl2->diff($tgl1);
        $durasi = $jarak->format('%a')+1;
        $harga  = $durasi*$cekMobil->harga;

        $data = [
                'id'=> $cekMobil->id,
                'start_date'=> $request->start_date,
                'end_date'=>$request->end_date,
                'mobil'=> $cekMobil->nama_mobil,
                'harga'=> $cekMobil->harga,
                'durasi'=>$durasi,
                'total_bayar'=> $harga,
                'denda' => $cekMobil->denda,
                'order'=> Carbon::now()->isoFormat('D MMMM Y')
            ];
        if(empty($request->session()->get('data'))){
            $order = new Transaction();
            $order->fill($data);
            $request->session()->put('data', $order);
        }else{
            $order = $request->session()->get('data');
            $order->fill($data);
            $request->session()->put('data', $order);
        }
        return redirect()->route('stepTwos');
    }
    // public function change(Request $request){
    //     $cek = User::where('id',Auth::user()->id)->first();
    //     $request->validate([
    //         'name' =>'|min:5|max:255',
    //         'no_handphone'=> '|min:5|max:255'
    //     ]);
    //     $cek->update($request->all());
    //     return redirect()->back();
    // }
    public function stepTwos(Request $request){
        $data = $request->session()->get('data');
        if ($data == null) {
            # code...
            abort(404);
        }
        $bank = Bank::all();
        if (count($bank) == 0) {
            # code...
            $request->session()->forget('data');
            return redirect()->back();
        }
        return view('frontend.content.step.DT',compact('data','bank'));
    }
    public function cancel(Request $request){
        $data = $request->session()->get('data');
        if ($data == null) {
            # code...
            abort(404);
        }else{
            $request->session()->forget('data');
        }
        return redirect('/mobil');
    }
    public function step3(Request $request){
        
        $validator = Validator::make($request->all(),['bank'=> 'required|integer']);
        if ($validator->fails()) {
            # code...
            return redirect()->back()->withwarning($validator->getMessageBag()->first());
        }
        $cekBank = Bank::find($request->bank);
        if ($cekBank == null) {
            # code...
            return redirect()->back()->withwarning('Try Again');
        }
        $order = $request->session()->get('data');
        if ($order == null) {
            # code...
            return redirect('/');
        }
        // dd($order);
        $data = [
            'users_id'=> auth()->id(),
            'cars_id'=> $order['id'],
            'banks_id'=> $request->bank,
            'invoice'=> '',
            'nama'=> Auth::user()->name,
            'email'=> Auth::user()->email,
            'no_handphone'=> Auth::user()->no_handphone,
            'mobil'=> $order['mobil'],
            'harga'=> $order['harga'],
            'durasi'=>$order['durasi'],
            'nama_bank'=> $cekBank->nama_bank,
            'atas_nama'=> $cekBank->atas_nama,
            'norek'=> $cekBank->norek,
            'total_bayar'=> $order->total_bayar,
            'denda'=>$order->denda,
            // 'total_denda'=> '0',
            // 'bukti_bayar'=> 'null',
            'start_date'=> $order['start_date'],
            'end_date'=>$order['end_date'],
            'status'=> '1'
        ];
        $a = Transaction::create($data);
        $request->session()->forget('data');
        return redirect()->route('invoice',$a->id)->with('success','Orderan Berhasil di buat');
    }
    public function step4(Request $request){
        $validator = Validator::make($request->all(),[
            'gambar'=> 'required|image|mimes:jpg,png,jpeg|max:2048',
            'id'=>'required|integer'
        ]);

        if ($validator->fails()) {
            # code...
            return redirect()->back()->withErrors($validator);
        }
        $invoice = Str::random(7);
        $data = Transaction::findOrFail($request->id);
        if ($image = $request->file('gambar')) {
            $destinationPath = 'bukti-pembayaran/';
            $PaymentImage = $invoice . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $PaymentImage);
            $proofPayment = "$PaymentImage";
        }
        $data->update([
            'bukti_Bayar'=> $proofPayment,
            'status'=> '2',
            'invoice'=> $invoice
        ]);
        $myEmail = "ngelandtourjogja123@gmail.com";
        $details = [
            'title' => 'New Booking',
            'url' => env('APP_URL')
        ];
        dd($details['url']);
        Mail::to($myEmail)->send(new orderEmail($details));
        return redirect()->back()->with('upload','Berhasil Upload Bukti Pembayaran, Kami akan mengkonformasi sesegera mungkin');
    }
}
