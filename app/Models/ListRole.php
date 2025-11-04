<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListRole extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'page_visit',
        'is_active',
    ];


    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
