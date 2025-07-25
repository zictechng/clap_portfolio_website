<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLike extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'user_id',
        'project_id',
        ];
}
