<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use ALajusticia\Expirable\Traits\Expirable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OtpCode extends Model
{
    use HasFactory;
    use Expirable;

    protected $fillable = [
        'code','email','user_id'
    ];

    public static function defaultExpiresAt()
    {
        return Carbon::now()->addMinutes(10);
    }
}
