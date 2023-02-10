<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class WalletUser extends Model implements AuthenticatableContract
{
    use HasFactory;

    protected $fillable = [
        'wallet_address'
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->wallet_address;
    }

    public function getAuthIdentifierName()
    {

    }

    public function getAuthIdentifier()
    {

    }

    public function getRememberToken()
    {

    }

    public function setRememberToken($value)
    {

    }

    public function getRememberTokenName()
    {

    }
}
