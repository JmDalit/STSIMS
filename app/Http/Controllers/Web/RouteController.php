<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\RouteRequest;
use App\Models\ListRoutes;
use App\References\ListClass;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RouteController extends Controller
{
    function index(ListClass $reference)
    {
        return Inertia::render('Web/routePage', [
            'routes' => $reference->getMenu(),
            'routeOption' => $reference->getMenu('option'),
            'roleOption' => $reference->getRoles(false)
        ]);
    }


    public function store(RouteRequest $request)
    {
        $data = $request->validated();


        ListRoutes::create([
            'route'         => $data['route'],
            'label'         => $data['label'],
            'slug'          => $data['slug'],
            'icon'          => $data['icon'],
            'component'     => $data['component'],
            'is_submenu'    => $data['isSubmenu'],
            'main_id'       => $data['submenu']['id'] ?? null,
            'roles'         =>  $data['role'],
            'created_by'    => Auth::user()->profile->fullname
        ]);

        return redirect()->back()->with('flash', [
            'status' => 'success',
            'message' => 'Menu route successfully created.',
        ]);;
    }
}
