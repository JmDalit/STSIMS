<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\References\ListClass;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RouteController extends Controller
{
    function index(ListClass $reference)
    {
        return Inertia::render('Web/routePage', [
            'routes' => $reference->getMenu(true)
        ]);
    }
}
