<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListRoutes extends Model
{
    protected $fillable = [
        'route',
        'component',
        'roles',
        'main_id',
        'slug',
        'label',
        'icon',
        'is_submenu',
        'is_active',
        'is_delete',
        'order_no',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'roles' => 'array',
    ];

    public function children()
    {
        return $this->hasMany(ListRoutes::class, 'main_id');
    }
}
