<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable= [
        'user_id','wallet_id','trx_ref','amount','bank_id'
    ];

    public static function boot()
    {
        parent::boot();
        self::created(function ($model) {
            $model->trx_ref = 'MCY' . str_pad($model->id, 7, "0", STR_PAD_LEFT);
            $model->save();
        });
    }
}
