<?php

namespace App\Http\Controllers\Api;

use App\Models\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MiscController extends BaseController
{
    public function getAdminAccount()
    {
        $account = Bank::whereUserId(1)->latest()->first();
        return $this->sendResponse($account, 'Account fetched successfully.');
    }
}
