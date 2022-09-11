<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trading extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount','price','account_number','listing_id','user_id','account_name','bank_name','trans_id',
    ];
}
