<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'mobile_number', 'email', 'church_unit', 'members_count'
    ];
}
