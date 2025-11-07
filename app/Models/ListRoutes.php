<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListRoutes extends Model
{
    protected $fillable = [
        'route',
        'component',
        'slug',
        'icon',
        'is_submenu',
        'order_no',
        'parent_id',
        'is_active'
    ];
}
