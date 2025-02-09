<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $fillable = [
        'first_name', 'last_name', 'mobile_number', 'email', 'date_of_birth', 'anniversary_date', 'church_unit', 'custom_fields'
    ];

    protected $casts = [
        'custom_fields' => 'array',
    ];
}
