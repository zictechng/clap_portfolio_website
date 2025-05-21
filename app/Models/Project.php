<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table="projects";

    public function user()
    {
        return $this->belongsTo(User::class, 'user_uid', 'id');
    }
    public function projectTools()
    {
        return $this->hasMany(ProjectTools::class);
    }

    public function likes()
    {
        return $this->hasMany(ProjectLike::class);
    }

    public function comments()
    {
        return $this->hasMany(ProjectComment::class);
    }
}
