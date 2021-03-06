<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use App\Transaction;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\NgelandTourNotification;
class adminTransController extends Controller
{
    public function index(){

        // dd(Transaction::latest()->get());
        return view('backend.content.payment.index',['data'=> Transaction::latest()->get()]);
    }

    public function details($id){
        $data = Transaction::findOrFail($id);
        // dd(count(array($data->bukti_Bayar)));
        return view('backend.content.payment.details',compact('data'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'status'=>'required|integer'
        ]);
        $data = Transaction::findOrFail($id);
        // $cek = $data->user()->get();
        if ($request->status == 3) {
            # code...
            // kirim email pemberitahuan ke customer bahwa Booking Mobilnya Berhasil di Acc
            $myEmail = $data->email;
            $details = [
                'title' => 'Rental Mobil Berhasil',
                'invoice'=> $data->invoice,
                'pesan'=>"
                    Selamat Rental yang anda Ajukan, berhasil di ACC oleh Admin NgelandTour
                    God Bless You
                ",
                'url' => env('APP_URL')
            ];
            Mail::to($myEmail)->send(new NgelandTourNotification($details));
        }
        if ($request->status == 5) {
            # code...
            // kirim email pemberitahuan ke customer Bahwa Booking mobilnya gagal
            $myEmail = $data->email;
            $details = [
                'title' => 'Rental Mobil GAGAL',
                'invoice'=> $data->invoice,
                'pesan'=>"
                    Mohon Maaf Rental yang Anda ajukan GAGAL
                    God Bless You
                ",
                'url' => env('APP_URL')
            ];
            Mail::to($myEmail)->send(new NgelandTourNotification($details));
        }
        $data->update($request->all());
        return redirect()->back()->with('success','Data berhasil Di Ubah');
    }

    public function pengembalian(Request $request,$id){
        $todayDate = date('Y-m-d');
        $request->validate([
            'tanggal'=>'required|date|date_format:Y-m-d|after_or_equal:'.$todayDate,
        ]);
        $data = Transaction::findOrFail($id);

        $tgl1 = new DateTime($request->tanggal);
        $tgl2 = new DateTime($data->end_date);
        $jarak = $tgl2->diff($tgl1);
        $durasi = $jarak->format('%a');
        $harga  = $durasi*$data->denda;

        $newData = [
            'return_date' => $request->tanggal,
            'total_denda' => $harga,
            'durasi_pengembalian'=> $durasi,
            'status' => '4'
        ];
        $data->update($newData);
        // dd($data);
        if ($data->status == 4) {
            # code...
            // kirim email pemberitahuan ke customer Dan bilang Terimkasih
            $myEmail = $data->email;
            $details = [
                'title' => 'Rental Mobil Selesai',
                'invoice'=> $data->invoice,
                'pesan'=>"
                    Terimakasih Telah Menggunakan Jasa Ngeland Tour untuk perjalanan Anda
                ",
                'url' => env('APP_URL')
            ];
            Mail::to($myEmail)->send(new NgelandTourNotification($details));
        }
        return redirect()->back()->with('success','Berhasil Mencatat Tanggal Saat Mobil Di Kembalikan');
    }

    public function destroy($id){
        $data = Transaction::findOrFail($id);
        $data->delete();
        if(File::exists(public_path('bukti-pembayaran/'.$data->bukti_Bayar))) {
            File::delete(public_path('bukti-pembayaran/'.$data->bukti_Bayar));
        }
        return redirect('/transaksi')->with('success','Transaction Berhasil Di Hapus');
    }
    
    public function download($id){
        $data = Transaction::findOrFail($id);
        if(File::exists(public_path('bukti-pembayaran/'.$data->bukti_Bayar))) {
            $filepath = public_path('bukti-pembayaran/'.$data->bukti_Bayar);
            return Response::download($filepath); 
        }else {
            return redirect()->back()->with('cek','Gambar Kosong');
        }
    }
}
