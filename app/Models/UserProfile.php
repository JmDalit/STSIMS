<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{


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
}
