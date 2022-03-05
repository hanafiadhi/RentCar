<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function car(){
        return $this->belongsTo(car::class);
    }

    public function bank(){
        return $this->belongsTo(Bank::class,'banks_id');
    }
}
