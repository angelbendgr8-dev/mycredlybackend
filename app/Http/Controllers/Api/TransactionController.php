<?php

namespace App\Http\Controllers\Api;

use App\Models\Bank;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Listing;
use App\Models\Trading;
use App\Models\Withdrawal;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class TransactionController extends BaseController
{
    public function fundWallet(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric',
            'wallet_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $credentials = $validator->validated();
        $credentials['user_id'] = Auth::id();
        $bank = Bank::whereUserId(1)->inRandomOrder()->first();
        $credentials['bank_id'] = $bank->id;
        $transaction = Transaction::create($credentials);

        return $this->sendResponse(['transaction'=>$transaction,'bank'=>$bank], 'Transaction Saved  Successfully.');

    }
    public function uploadReceipt(Request $request)
    {
        // return $this->sendError('Unable to upload image', []);
        // return $this->sendResponse($request->image, 'Entered here');

        try {
            // $image = ;
            if ($request->file('image')) {
                $image = $request->file('image');
                // $filename = time() . rand() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->store('receipts', 'public');
                // return $this->sendResponse($imagePath, 'Reciept got here');
            }
            $trans = Transaction::find($request->wallet_id);

            $trans->status = 'paid';
            $trans->receipt = $imagePath;
            $trans->save();
            return $this->sendResponse($trans, 'Reciept Uploaded successfully');
        } catch (\Throwable $th) {
            return $this->sendError('Unable to upload reciept', $th);
        }
    }
    public function withdrawFunds(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric',
            'wallet_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $credentials = $validator->validated();
        $credentials['user_id'] = Auth::id();
        $credentials['bank_id'] = $request->bank_id?? null;
        $credentials['address'] = $request->address?? null;
        $credentials['type'] = $request->type;
        $credentials['network'] = $request->network?? null;

        $withdrawal = Withdrawal::create($credentials);
        return $this->sendResponse($withdrawal, 'Withdrawal created successfully');

    }

    public function getTransactions()
    {
        $transactions = Transaction::whereUserId(Auth::id())->get();
        return $this->sendResponse($transactions, 'Transaction Fetched successfully');
    }
    public function getWithdrawals()
    {
        $transactions = Withdrawal::whereUserId(Auth::id())->get();
        return $this->sendResponse($transactions, 'Withdrawals Fetched successfully');
    }

    public function createListing(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();

        try {
            $listing = Listing::create($data);
            return $this->sendResponse($listing, 'Listing Created successfully');
        } catch (\Throwable $th) {
            return $this->sendError('Unable to create listing', $th);
        }

    }
    public function getListing()
    {
        $listings = Listing::whereAvailable(true)->with('user')->get();
        return $this->sendResponse($listings, 'Listings Fetched successfully');
    }
    public function getTrading()
    {
        $mytrades = Trading::whereUserId(Auth::id())->with('user','listing')->get();
        $othertrades = Trading::whereTraderId(Auth::id())->with('user','listing')->get();
        $trades = [
            'mytrades' => $mytrades,
            'othertrades' => $othertrades,
        ];
        return $this->sendResponse($trades, 'Trading Fetched successfully');
    }
    public function createTrading(Request $request){
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['trans_id'] = Str::random(16);

        try {
            $trading = Trading::create($data);
            return $this->sendResponse($trading, 'Trading Created successfully');
        } catch (\Throwable $th) {
            return $th;
            return $this->sendError('Unable to create trading', $th);
        }
    }
    public function confirmTradingPayment(Request $request)
    {
       $trading = Trading::find($request->id);
       $listing = Listing::find($trading->listing_id)->with('user')->first();
       if($listing->payment_type !== 'bank transfer'){
        //    return $listing;
           $trading->status = 'paid';
           $trading->save();
           return $this->sendResponse([], 'Trading Status has been updated, Please wait for approval');

       }else{
        $this->processPayment($request->id);
       }
    }
    public function cancelTrading(Request $request)
    {
       $trading = Trading::find($request->id);
       $trading->status = 'cancelled';
       $trading->save();
       return $this->sendResponse([], 'Trading has been cancelled');
    }
    public function appealTrading(Request $request)
    {
       $trading = Trading::find($request->id);
       $trading->status = 'appealled';
       $trading->save();
       return $this->sendResponse([], 'Trading has been cancelled');
    }
    public function completeTrading(Request $request)
    {
       $trading = Trading::find($request->id);
       $trading->status = 'completed';
       $trading->save();
       return $this->sendResponse([], 'Trading completed successfully');
    }
    public function disputeTrading(Request $request)
    {
       $trading = Trading::find($request->id);
       $trading->status = 'dispute';
       $trading->save();
       return $this->sendResponse([], 'complaint has been added successfully');
    }
    public function completeSellTrading($id)
    {
        $trading = Trading::find($id);
        $listing = Listing::whereListingId($trading->listing_id)->with('user')->first();
        $baddress = Wallet::whereName($listing->asset)->whereUserId(Auth::id())->first();
    }
    public function completeBuyTrading($id)
    {
        $trading = Trading::find($id);
        $listing = Listing::whereListingId($trading->listing_id)->with('user')->first();
        $baddress = Wallet::whereName($listing->asset)->whereUserId($trading->user_id)->first();
        $saddress = Wallet::whereName($listing->asset)->whereUserId(Auth::id())->first();
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function processPayment($id)
    {
        $trading = Trading::find($id);
        $listing = Listing::whereListingId($trading->listing_id)->with('user')->first();
        if($listing->type === 'buy'){
            $buyer = User::whereUserId($trading->user_id)->first();
            $seller = User::whereUserId($listing->user_id)->first();
            // get Buyer crypto address
            $baddress = Wallet::whereName($listing->asset)->whereUserId($buyer->id)->first();
            // get Seller crypto address
            $saddress = Wallet::whereName($listing->asset)->whereUserId($seller->id)->first();
            // get buyer naira address;
            $bwaddress = Wallet::whereName('NGN')->whereUserId($buyer->id)->first();
            // get seller naira address;
            $swaddress = Wallet::whereName('NGN')->whereUserId($seller->id)->first();
            if($bwaddress->balance < $trading->price){
                return $this->sendError('Insufficient wallet fund', []);
            }else{
                $bwaddress->balance = $bwaddress->balance - $trading->price;
                $bwaddress->save();
                $swaddress->balance = $swaddress->balance - $trading->price;
                $swaddress->save();

            }
        }else{
            $seller = User::whereUserId($trading->user_id)->first();
            $buyer = User::whereUserId($listing->user_id)->first();
            // get Buyer crypto address
            $baddress = Wallet::whereName($listing->asset)->whereUserId($buyer->id)->first();
            // get Seller crypto address
            $saddress = Wallet::whereName($listing->asset)->whereUserId($seller->id)->first();
            // get buyer naira address;
            $bwaddress = Wallet::whereName('NGN')->whereUserId($buyer->id)->first();
            // get seller naira address;
            $swaddress = Wallet::whereName('NGN')->whereUserId($seller->id)->first();
            if($bwaddress->balance < $trading->price){
                return $this->sendError('Transaction cannot be completed', []);
            }else{

                $bwaddress->balance = $bwaddress->balance - $trading->price;
                $bwaddress->save();
                $swaddress->balance = $swaddress->balance - $trading->price;
                $swaddress->save();
            }
        }
    }
    public function transferCrypto($sender,$receiver,$trade,$asset)
    {


            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'x-api-key' => env('TATUM_API_KEY'),
            ])->retry(3, 100)->post('https://api-eu1.tatum.io/v3/'.$asset.'/transaction', [
                'fromAddress' => [
                    'address' => $sender->address,
                    'privateKey' => $sender->privateKey
                ],
                'to' => [
                    'address' => $receiver->address,
                    'value' => $trade->amount,
                ],
            ]);
            return $response;


    }

}
