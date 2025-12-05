<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationCity extends Model
{
    protected $fillable = [
        'code',
        'name',
        'old_name',
        'district',
        'zipcode',
        'province_code',
        'is_municipality',
        'is_chartered',
        'created_by',
        'updated_by',
        'is_active',
        'is_delete',
    ];

    protected $appends = ['province_array'];



    public function provinceCode()
    {
        return $this->belongsTo(LocationProvinces::class, 'province_code', 'code');
    }

    public function getProvinceArrayAttribute()
    {
        return $this->provinceCode ? [
            'id' => $this->province_code,
            'name' => $this->provinceCode->name,
        ] : null;
    }
}
