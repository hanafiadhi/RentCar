<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table ='banks';
    protected $guarded = [];

    public function banks(){
        return $this->hasMany(Transaction::class,'banks_id');
    }
}
