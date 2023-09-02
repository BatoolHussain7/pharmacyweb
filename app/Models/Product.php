<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\Table\Table;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'pharmacist_net',
        'customer_net',
        'description',
        'img',
        'company_id',
        'expiration_date',
        'production_date'
    ];
    protected $hidden =
    [
        'created_at',
        'updated_at'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    // public function pharmacyproduct()
    // {
    //     return $this->belongsTo(PharmacyProduct::class);
    // }
    public function admins()
    {
        return $this->belongsToMany(Admin::class);
    }
    public function pharmacyproduct()
    {
        return $this->belongsTo(PharmacyProduct::class);
    }
    public function billinfos(){
        return $this->belongsTo(Billinfo::class);
    }
    public function client()
    {
        return $this->belongsToMany(Clinet::class);
    }
}
