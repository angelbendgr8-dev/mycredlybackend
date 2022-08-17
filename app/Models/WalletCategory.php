<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WalletCategory extends Model
{
    use HasFactory;

    /**
     * Get all of the wallets for the WalletCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function wallets()
    {
        return $this->hasMany(WalletType::class);
    }
    /**
     * Get all of the wallets for the WalletCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function uwallets()
    {
        return $this->hasMany(Wallet::class);
    }
}
