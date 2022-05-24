<?php

use App\Bank;
use App\website;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class sosialSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['icon'=>'<i class="fab fa-instagram"></i>','nama'=>'Instagram','url'=>'https://www.instagram.com/'],
            ['icon'=>'<i class="fab fa-whatsapp"></i>','nama'=>'Whatsapp','url'=>'https://wa.me/6281355538777'],
            ['icon'=> '<i class="far fa-envelope"></i>','nama'=>'Gmail','url'=>'https://www.google.com/intl/id/gmail/about/']
        ];
        foreach($data as $key =>$value){
            DB::table('sosials')->insert([
                $key => $value
            ]);
        }
        $data2 = [
            [
                'kode_tipe' => '1121',
                'nama_tipe' => 'Van / Mini Bus'
            ],[
                'kode_tipe' => '1122',
                'nama_tipe' => 'MPV (Multi Purposes Vehicle)'
            ],[
                'kode_tipe' => '1123',
                'nama_tipe' => 'SUV (Sport Utility Vehicle)'
            ]
        ];
        foreach($data2 as $key => $value){
            DB::table('type')->insert([
                $key => $value
            ]);
        }

        $data3 = [
            [
                'nama_fitur' => 'Mp3 Player'
            ],[
                'nama_fitur'=> 'Air Mineral'
            ],[
                'nama_fitur'=> 'Wifi'
            ],[
                'nama_fitur'=> 'Kantong Plastik'
            ]
        ];
        foreach($data3 as $key => $value){
            DB::table('fiturs')->insert([
                $key=> $value
            ]);
        }
        Bank::create([
            'nama_bank'=>'BCA',
            'atas_nama'=>'Admin',
            'norek'=> 12345678
        ]);
        website::create([
            'app_name'=> 'YNTKTS',
            'site_desciption'=> 'YNTKTS',
            'favicon'=> 'YNTKTS',
            'Logo'=> 'YNTKTS'
        ]);
    }
}
