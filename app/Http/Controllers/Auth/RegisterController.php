<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Inertia\Response;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RegisterController extends Controller
{

    public function create(): Response
    {
        return Inertia::render('Auth/registerPage');
    }
}
