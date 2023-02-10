<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NftTransaction extends Model
{
    use HasFactory;

    protected $fillable = [

        'nft_asset_id',
        'address_from',
        'address_to',
    ];


    // public function nft_asset()
    // {
    //     return $this->hasOne(NftAsset::class);
    // }
}