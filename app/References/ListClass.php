<?php

namespace App\References;

use App\Models\ListRole;
use App\Models\ListRoutes;
use Illuminate\Support\Facades\Auth;

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


    public function getMenu(string $typemenu = 'table')
    {
        switch ($typemenu) {
            case 'option':
                return ListRoutes::where('is_delete', false)->where('is_active', true)->where('is_submenu', false)->whereNull('route')->get()->map(function ($route) {
                    return [
                        'id' => $route->id,
                        'name' => $route->label,
                    ];
                });
                break;
            case 'sidebar':
                return ListRoutes::where('is_delete', false)->where('is_submenu', false)->where('is_active', true)
                    ->whereRaw("
                        EXISTS (
                            SELECT 1 
                            FROM json_array_elements(roles) elem 
                            WHERE (elem->>'id')::int = ?
                        )
                    ", [Auth::user()->role_id ?? null])
                    ->with(['children' => function ($q) {
                        $q->where('is_delete', false);
                    }])
                    ->orderBy('order_no', 'ASC')
                    ->get()->map(function ($route) {
                        return [
                            'key'   => (string) $route->id,
                            'icon'  => $route->icon,
                            'label' => $route->label,
                            'slug'  => $route->slug,
                            'route' => $route->route,
                            'component' => $route->component,
                            'items' => $route->children->map(function ($child, $index) use ($route) {

                                return [
                                    'key' => "{$route->id}-{$index}",
                                    'icon' => $child->icon,
                                    'label' => $child->label,
                                    'slug'  => $child->slug,
                                    'route' => $child->route,
                                    'subItem' => $child->is_submenu,
                                    'component' => $child->component,
                                    'parent_id' => $route->id
                                ];
                            })->toArray(),
                        ];
                    });
                break;
            default:
                return ListRoutes::where('is_delete', false)->where('is_submenu', false)
                    ->with(['children' => function ($q) {
                        $q->where('is_delete', false);
                    }])
                    ->orderBy('order_no', 'ASC')
                    ->get()->map(function ($route) {
                        return [
                            'key' => (string) $route->id,
                            'icon' => $route->icon,
                            'name' => $route->label,
                            'created_by' => $route->created_by,
                            'roles' => $route->roles,
                            'data' => [
                                'name' => $route->label,
                                'route' => $route->route,
                                'created_by' => $route->created_by,

                            ],
                            'children' => $route->children->map(function ($child, $index) use ($route) {
                                $child->orderBy('order_no');
                                return [
                                    'key' => "{$route->id}-{$index}",
                                    'icon' => $child->icon,
                                    'name' => $child->label,
                                    'created_by' => $child->created_by,
                                    'roles' => $child->roles,
                                    'data' => [
                                        'name' => $child->label,
                                        'route' => $child->route,
                                        'created_by' => $child->created_by,

                                    ],
                                ];
                            })->toArray(),
                        ];
                    });
                break;
        }
    }
}
