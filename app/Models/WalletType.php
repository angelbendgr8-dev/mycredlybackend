<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WalletType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','icon','symbol','wallet_category_id'
    ];

    // /**
    //  * Get the user that owns the WalletType
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function category()
    // {
    //     return $this->belongsTo(WalletCategory::class);
    // }
    /**
     * Get the user that owns the WalletType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(WalletCategory::class, 'wallet_category_id');
    }
}
