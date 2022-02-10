<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fitur extends Model
{
    protected $table='fiturs';
    protected $fillable=['nama_fitur'];
    public function cars(){
        return $this->belongsToMany(car::class);
    }
}
