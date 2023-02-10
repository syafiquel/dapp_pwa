<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NftAsset extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'ipfs_url',
        'token_id',
        'price',
        'collection_id',
        'wallet_user_id'
    ];

    public function collection()
    {
        return $this->belongsTo(NftCollection::class);
    }

    public function wallet_user()
    {
        return $this->hasOne(WalletUser::class);
    }

}