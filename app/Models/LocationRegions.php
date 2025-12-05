<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationRegions extends Model
{
    protected $fillable = [
        'code',
        'name',
        'region',
        'island',
        'is_active',
        'is_delete',
        'created_by',
        'updated_by'
    ];

    protected $appends = ['island_array'];

    public function getIslandArrayAttribute()
    {
        return $this->island ? [
            'id' => 1,
            'name' => $this->island,
        ] : null;
    }

    public function provinceCode()
    {
        return $this->hasMany(LocationProvinces::class, 'region_code', 'code');
    }
}
