<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ListRole extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'page_visit',
        'is_active',
    ];

    protected $casts = [
        'page_visit' => 'array',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }

    protected $appends = ['formatted_date'];

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('M d, Y | h:i a');
    }
}
