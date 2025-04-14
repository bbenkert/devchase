<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $casts = [
        'tech_stack' => 'array',
        'is_featured' => 'boolean',
    ];
    
    protected $fillable = [
        'title',
        'description',
        'tech_stack',
        'screenshot',
        'demo_link',
        'github_link',
        'is_featured',
    ];
    
}
