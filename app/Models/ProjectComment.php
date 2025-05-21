<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'body',
        'ip_address',
        'user_id',
        'project_id',
        ];
}
