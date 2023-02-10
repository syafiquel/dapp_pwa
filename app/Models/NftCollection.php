<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NftCollection extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'nft_smart_contract_id',
    ];

    public function nft_smart_contract()
    {
        return $this->hasOne(NftSmartContract::class);
    }

}