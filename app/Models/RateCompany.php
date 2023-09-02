<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateCompany extends Model
{
    use HasFactory;
    public function pharmacy(){
        return $this->belongsTo(Admin::class);
    }
    // public function company(){
    //     return $this->belongsToMany(Company::class);
    // }
}
