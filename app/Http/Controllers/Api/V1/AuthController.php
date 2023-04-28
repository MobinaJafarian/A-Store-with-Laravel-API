<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function sendSms(Request $request)
    {
        $mobile = $request->input('mobile');
    }
}
