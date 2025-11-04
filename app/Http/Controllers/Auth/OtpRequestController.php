<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;


class OtpRequestController extends Controller
{
    public function create(LoginRequest $request)
    {
        $request->otpAuthenticate();


        return redirect()->back();
    }
}
