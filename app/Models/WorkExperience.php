<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_uid',
        'user_email',
        'job_title',
        'job_organization',
        'job_start_date',
        'job_end_date',
        'job_active',
    ];

}
