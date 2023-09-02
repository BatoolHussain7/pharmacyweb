<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PharamcyEmployee extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * Get the identifier that will be stored in the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key-value array of custom claims to be included in the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            
            // Add any other custom claims you want to include here...
        ];
    }
    protected $fillable = [
        'employee_name',
        'email',
        'password',
    ];
}
