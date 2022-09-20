<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trading extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount','price','account_number','listing_id','user_id','account_name','bank_name','trans_id','trader_id'
    ];

    /**
     * Get the user that owns the Trading
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the trader that owns the Trading
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'trader_id');
    }

    /**
     * Get the lising that owns the Trading
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class, 'listing_id');
    }
}
