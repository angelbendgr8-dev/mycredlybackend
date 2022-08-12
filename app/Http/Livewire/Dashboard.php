<?php

namespace App\Http\Livewire;

use App\Models\Wallet;
use Livewire\Component;
use App\Models\WalletType;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class Dashboard extends Component
{

    public function mount(){
        $wallets = WalletType::with('category')->get();
        // dd($wallets);
        foreach ($wallets as $key => $wallet) {
            if($wallet->wallet_category_id === 2){
                $newwallet = $this->createWallet($wallet->name);
                $address= $this->generateAddress($newwallet->xpub,$wallet->name);
                $tempwall = new Wallet();
               $tempwall->user_id = Auth::id();
               $tempwall->name = $wallet->symbol;
               $tempwall->wallet_category_id = $wallet->wallet_category_id;
               $tempwall->wallet_type_id = $wallet->id;
               $tempwall->mnemonic = $newwallet->mnemonic;
               $tempwall->xpub = $newwallet->xpub;
               $tempwall->address = $address->address;
              $tempwall->save();
            }else{
                $tempwall = new Wallet();
               $tempwall->user_id = Auth::id();
               $tempwall->name = $wallet->symbol;
               $tempwall->wallet_type_id = $wallet->id;
               $tempwall->wallet_category_id = $wallet->wallet_category_id;
                $tempwall->save();
            }
        }
    }
    public function render()
    {
        return view('livewire.dashboard')->layout('layouts.main');
    }
    public function generateWallet()
    {
        $wallets = WalletType::get();
        dd($wallets);
    }

    public function createWallet($type)
    {
        try {
            $memonics = Str::random(random_int(100, 500));
            $walletInfo = Http::withHeaders([
                'x-api-key' => env('TATUM_API_KEY'),
            ])->retry(3, 100)->get('https://api-eu1.tatum.io/v3/' . $type . '/wallet?memonic' . $memonics)->object();
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
            ])->retry(3, 100)->get('https://api-eu1.tatum.io/v3/'.$type.'/address/' . $pubkey . '/' . 1)->object();
            return $walletAddress;
        } catch (\Throwable $th) {
            return;
        }
    }

}
