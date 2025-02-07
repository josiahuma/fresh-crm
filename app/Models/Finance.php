<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    //
    protected $fillable = [
        'income', 'expense', 'description', 'date'
    ];
}
