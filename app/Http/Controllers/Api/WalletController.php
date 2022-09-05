<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\WalletResource;
use App\Models\Wallet;
use App\Models\WalletType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class WalletController extends BaseController
{
    public function generateWallet($id)
    {
        $wallets = WalletType::with('category')->get();
        // dd($wallets);
        foreach ($wallets as $key => $wallet) {
            if ($wallet->wallet_category_id === 2) {
                $newwallet = $this->createWallet($wallet->name);
                $address = $this->generateAddress($newwallet->xpub, $wallet->name);
                $tempwall = new Wallet();
                $tempwall->user_id = $id;
                $tempwall->name = $wallet->symbol;
                $tempwall->wallet_category_id = $wallet->wallet_category_id;
                $tempwall->wallet_type_id = $wallet->id;
                $tempwall->mnemonic = $newwallet->mnemonic;
                $tempwall->xpub = $newwallet->xpub;
                $tempwall->address = $address->address;
                $tempwall->save();
            } else {
                $tempwall = new Wallet();
                $tempwall->user_id = $id;
                $tempwall->name = $wallet->symbol;
                $tempwall->wallet_type_id = $wallet->id;
                $tempwall->wallet_category_id = $wallet->wallet_category_id;
                $tempwall->save();
            }
        }
        return;
    }

    public function createWallet($type)
    {
        try {
            $memonics = Str::random(random_int(100, 500));
            $walletInfo = Http::withHeaders([
                'x-api-key' => env('TATUM_API_KEY'),
            ])->retry(3, 100)->get('https://api-eu1.tatum.io/v3/' . $type . '/wallet?memonic' . $memonics)->object();
            return $walletInfo;
        } catch (\Throwable$th) {
            return;
        }
    }

    public function generatePrivateKey(string $pubkey)
    {
        # code...
    }
    public function generateAddress(string $pubkey, string $type)
    {
        // https://api-eu1.tatum.io/v3/bitcoin/address/" . xpub . "/" . index,
        try {
            // $memonics = Str::random(random_int(100, 500));
            $walletAddress = Http::withHeaders([
                'x-api-key' => env('TATUM_API_KEY'),
            ])->retry(3, 100)->get('https://api-eu1.tatum.io/v3/' . $type . '/address/' . $pubkey . '/' . 1)->object();
            return $walletAddress;
        } catch (\Throwable$th) {
            return;
        }
    }

    public function getWallets()
    {
        $wallet = Wallet::whereUserId(Auth::id())->get();
        // return $wallet;
        if (count($wallet)> 0) {
            $wallets = WalletResource::collection(Wallet::whereUserId(Auth::id())->with(['wType', 'wCategory'])->get());
            return $this->sendResponse($wallets, 'Wallets fetched successfully.');
        } else {

            try {

                $result = $this->generateWallet(Auth::id());
                $wallets = WalletResource::collection(Wallet::whereUserId(Auth::id())->with(['wType', 'wCategory'])->get());
                return $this->sendResponse($wallets, 'Wallets fetched successfully.');
            } catch (\Throwable$th) {
                return $th;
            }
        }

    }

    public function getBalance($id)
    {
        $wallet = Wallet::whereId($id)->with('wtype','wcategory')->first();
        try {
            // $memonics = Str::random(random_int(100, 500));
            $balance = Http::withHeaders([
                'x-api-key' => env('TATUM_API_KEY'),
            ])->retry(3, 100)->get('https://api-eu1.tatum.io/v3/' . $wallet->wtype->name . '/address/balance/' . $wallet->address)->object();
        $wallet->balance = $balance->incoming;
        $wallet->save();
        $newwallet = new WalletResource(Wallet::whereId($id)->with('wtype','wcategory')->first());
        return $this->sendResponse($newwallet, 'Wallets balance successfully.');
        } catch (\Throwable$th) {
            return $th;
        }
    }

}
