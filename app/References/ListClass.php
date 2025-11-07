<?php

namespace App\References;

use App\Models\ListRole;
use App\Models\ListRoutes;

class ListClass
{
    public function getRoles(Bool $main)
    {
        if ($main) {
            return ListRole::where('is_active', true)->latest()->paginate(10);
        } else {
            return
                ListRole::where('is_active', true)->get()->map(function ($role) {
                    return [
                        'id' => $role->id,
                        'name' => $role->name,
                    ];
                });
        }
    }

    public function getMenu(Bool $main)
    {
        if ($main) {
            return ListRoutes::all();
        } else {
            return ListRoutes::all();
        }
    }
}
