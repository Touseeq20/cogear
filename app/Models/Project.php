<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'tech_stack',
        'image_path',
        'gallery',
        'demo_link',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'gallery' => 'array',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
