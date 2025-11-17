<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\RoleRequest;
use App\Models\ListRole;
use App\References\ListClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;


class RoleController extends Controller
{
    function index(ListClass $reference)
    {
        return Inertia::render('Web/rolePage', [
            'roles' => $reference->getRoles(true)
        ]);
    }


    function store(RoleRequest $request)
    {

        $data = $request->validated();

        ListRole::create([
            'name'          => $data['name'],
            'slug'          => $data['slug'],
            'description'   => $data['description'],
            'is_lock'       => $data['isLock'],
            'created_by'    => Auth::user()->profile->fullname
        ]);


        return redirect()->back()->with('flash', [
            'status' => 'success',
            'message' => 'Role successfully created.',
        ]);;
    }
}
