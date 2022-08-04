<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\BaseController;

class SettingController extends BaseController
{
    public function changePassword(Request $request)
    {
        $user = User::find(Auth::id());
        // return $this->sendResponse($request->old_password, 'Password updated successfully');
        if(Hash::check($request->old_password, $user->password)){
            $user->password = Hash::make($request->password);
            $user->save();
            return $this->sendResponse([], 'Password updated successfully');
        }else{
            return $this->sendError('Invalid Old password', []);
        }
        // Hash::check($value, $hashedValue)

    }
    public function createPin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pin' => 'required|string',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user = User::find(Auth::id());
        $user->transaction_pin = $request->pin;
        $user->has_pin = 1;
        $user->save();
        $user = new UserResource(User::findOrFail(Auth::id()));
        return $this->sendResponse($user, 'Pin updated successfully');
    }
    public function updatePin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_pin'=>'required|string',
            'pin' => 'required|string',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user = User::find(Auth::id());
        if($user->transaction_pin === $request->old_pin){
            $user->transaction_pin = $request->pin;
            $user->save();
            $user = new UserResource(User::findOrFail(Auth::id()));
            return $this->sendResponse($user, 'Pin updated successfully');
        }else{
            return $this->sendError('Invalid old pin', []);
        }
    }
    public function toggle2fa(Request $request)
    {

        $user = User::find(Auth::id());
        if($user->Auth2fa){
            $user->Auth2fa = false;
        }else{
            $user->Auth2fa = true;
        }
        // $user->Auth2fa = !$request->Auth2fa;
        $user->save();
        $user = new UserResource(User::findOrFail(Auth::id()));
        return $this->sendResponse($user, 'Security updated successfully');
    }


}
