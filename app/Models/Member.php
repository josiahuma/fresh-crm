<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $fillable = [
        'name', 'mobile_number', 'date_of_birth', 'anniversary_date', 'church_unit', 'custom_fields'
    ];

    protected $casts = [
        'custom_fields' => 'array',
    ];
}
