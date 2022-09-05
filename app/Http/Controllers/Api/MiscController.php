<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\WalletTypeResource;
use App\Models\Bank;
use App\Models\WalletType;
use Illuminate\Support\Facades\Http;

class MiscController extends BaseController
{
    public function getAdminAccount()
    {
        $account = Bank::whereUserId(1)->latest()->first();
        return $this->sendResponse($account, 'Account fetched successfully.');
    }
    public function getWalletType()
    {
        $account = WalletTypeResource::collection(WalletType::whereWalletCategoryId(2)->get());
        return $this->sendResponse($account, 'WalletFetched fetched successfully.');
    }
    public function getConversionRate($symbol, $convert, $amount)
    {
        try {
            // $memonics = Str::random(random_int(100, 500));
            $result = Http::withHeaders([
                'X-CMC_PRO_API_KEY' =>
                'c5c5a3fe-a7bb-4240-86c6-6cf3cb77aeb5',
                // /v2/tools/price-conversion?symbol=${credentials.symbol}&convert=${credentials.convert}&amount=${credentials.amount}
            ])->retry(3, 100)->get('https://pro-api.coinmarketcap.com/v2/tools/price-conversion?symbol=' . $symbol . '&convert=' . $convert . '&amount=' . $amount)->object();
            return $this->sendResponse($result->data[0]->quote->$convert->price, 'Converrtion fetched successfully.');
            // return ;
        } catch (\Throwable$th) {
            return $this->sendResponse($symbol, 'Converrtion fetched successfully.');
        }
    }
}
