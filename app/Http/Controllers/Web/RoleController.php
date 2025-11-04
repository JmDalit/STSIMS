<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;


class RoleController extends Controller
{
    function index()
    {
        return Inertia::render('Web/rolePage');
    }
}
