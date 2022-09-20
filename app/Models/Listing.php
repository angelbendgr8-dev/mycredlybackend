<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
       'user_id',
        'type',
        'asset',
        'pricing',
        'price',
        'amount',
        'value',
        'min_value',
        'min_value',
        'payment_type',
        'time',
        'term',
        'instructions',
    ];

    /**
     * Get the user that owns the Listing
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get all of the trading for the Listing
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trading(): HasMany
    {
        return $this->hasMany(Trading::class);
    }
}
