<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationProvinces extends Model
{
    protected $fillable = [
        'name',
        'code',
        'old_name',
        'region_code',
        'is_active',
        'is_delete',
        'created_by',
        'updated_by'
    ];

    protected $appends = ['region_array'];



    public function regionCode()
    {
        return $this->belongsTo(LocationRegions::class, 'region_code', 'code');
    }
    public function cityCode()
    {
        return  $this->hasMany(LocationCity::class, 'province_code', 'code');
    }

    public function getRegionArrayAttribute()
    {
        return $this->regionCode ? [
            'id' => $this->region_code,
            'name' => $this->regionCode->region,
        ] : null;
    }
}
