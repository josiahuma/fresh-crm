<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $fillable = [
        'first_name', 'last_name', 'gender', 'mobile_number', 'email', 'date_of_birth', 'anniversary_date', 'church_unit', 'church_leader', 'custom_fields'
    ];

    public function leader()
    {
        return $this->belongsTo(Leader::class, 'church_leader', 'firstname');
    }

    protected $casts = [
        'custom_fields' => 'array',
    ];
}
