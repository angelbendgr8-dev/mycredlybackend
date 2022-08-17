<?php

namespace App\Http\Controllers\Api;

use App\Models\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BankAndCardController extends BaseController
{
    public function addNewCard(Request $request)
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
        Bank::create($input);
        return $this->sendResponse($input, 'Account Added successfully.');
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
}
