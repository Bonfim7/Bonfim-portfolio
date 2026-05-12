<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image_path',
        'github_url',
        'demo_url',
        'order',
    ];

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
