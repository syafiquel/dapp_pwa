<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_account_id',
        'amount',
        'state',
        'email',
        'description',
        'reference',
        'receipt_url',
        'slug',
    ];
}
