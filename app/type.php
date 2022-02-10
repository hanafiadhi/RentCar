<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    protected $table = 'type';
    protected $fillable = ['kode_tipe', 'nama_tipe'];

    public function cars(){
        return $this->hasMany(car::class);
    }
}
