<?php

namespace App\Http\Controllers\Api;

use App\Models\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BankResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BankAndCardController extends BaseController
{
    public function addNewBank(Request $request)
    {
          // return $request->all();
          $validator = Validator::make($request->all(), [
            'bank_name' => 'required|string',
            'account_name' => 'required|string',
            'account_number' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $bank = Bank::create($input);
        return $this->sendResponse($bank, 'Account Added successfully.');
    }
    public function deleteCard($id){
        $account = Bank::whereId($id)->whereUserId(Auth::id())->first();
        if($account){
            $account->delete();
            return $this->sendResponse([], 'Account deleted successfully');
        }else{
            return $this->sendError('Account not found.', []);
        }
    }
    public function getBanks(){
        $account = BankResource::collection(Bank::whereUserId(Auth::id())->get());
        if($account){

            return $this->sendResponse($account, 'Account deleted successfully');
        }else{
            return $this->sendError('you have no account', []);
        }
    }
}
