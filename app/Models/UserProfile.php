<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{

    protected $fillable = [
        'fname',
        'lname',
        'agency_id',
        'contact_no',
        'designation',
        'avatar',

    ];

    protected $appends = [
        'fullname',

    ];

    public function getFullnameAttribute()
    {
        $first = $this->fname ?? '';
        $last = $this->lname ?? '';

        $fullname =  trim($first . ' ' . $last);
        $fullname = ucwords(strtolower($fullname));
        return $fullname === '' ? null : $fullname;
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
