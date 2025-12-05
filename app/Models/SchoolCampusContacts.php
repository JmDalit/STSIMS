<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolCampusContacts extends Model
{
    protected $fillable = [
        'campus_id',
        'dean',
        'registrar',
        'email',
        'contact',
        'webpage',
        'verified_by',
        'created_by',
        'updated_by',
        'verified_at'
    ];

    public function campus()
    {
        return $this->belongsTo(SchoolCampuses::class, 'campus_id', 'id');
    }
}
