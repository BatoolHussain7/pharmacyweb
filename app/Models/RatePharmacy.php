<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatePharmacy extends Model
{
    use HasFactory;
    // public function pharmacy(){
    //     return $this->belon
    // }
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
