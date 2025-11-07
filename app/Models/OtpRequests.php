<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtpRequests extends Model
{
    protected $fillable = [
        'user_id',
        'generated_token',
        'expires_at',
        'attempts',
        'status'
    ];
}
