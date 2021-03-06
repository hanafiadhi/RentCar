<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    protected $table = 'cars';
    protected $fillable =[
            'nama_mobil',
            'bagasi',
            'tempat_duduk', 
            'harga', 
            'denda', 
            'description', 
            'status', 
            'sopir',
            'transmisi',
            'type_id', 
            'gambar',
            'bahan_bakar'
        ];
    public function type(){
            return $this->belongsTo(type::class)->withDefault([
            'nama_tipe' => 'Guest Author'
        ]);
    }

    public function fiturs(){
        return $this->belongsToMany(Fitur::class);
    }

    public function mobil(){
        return $this->hasMany(Transaction::class);
    }
}
