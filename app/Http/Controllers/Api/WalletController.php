<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class WalletController extends Controller
{
    public function generateWallet(string $type)
    {
    }

    public function createWallet($type)
    {
        try {
            $memonics = Str::random(random_int(100, 500));
            $walletInfo = Http::withHeaders([
                'x-api-key' => env('TATUM_API_KEY'),
            ])->get('https://api-eu1.tatum.io/v3/' . $type . '/wallet?memonic' . $memonics)->object();
            return $walletInfo;
        } catch (\Throwable $th) {
            return;
        }
    }

    public function generatePrivateKey(string $pubkey)
    {
        # code...
    }
    public function generateAddress(string $pubkey,string $type)
    {
        https://api-eu1.tatum.io/v3/bitcoin/address/" . xpub . "/" . index,
        try {
            // $memonics = Str::random(random_int(100, 500));
            $walletAddress = Http::withHeaders([
                'x-api-key' => env('TATUM_API_KEY'),
            ])->get('https://api-eu1.tatum.io/v3/'.$type.'/address/' . $pubkey . '/' . 1)->object();
            return $walletAddress;
        } catch (\Throwable $th) {
            return;
        }
    }
}
