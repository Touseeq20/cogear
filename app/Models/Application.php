<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'field_of_interest',
        'message',
        'cv_path',
        'status',
        'admin_notes',
    ];
}
