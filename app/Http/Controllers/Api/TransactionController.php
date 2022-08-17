<?php

namespace App\Http\Controllers\Api;

use App\Models\Bank;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
}
