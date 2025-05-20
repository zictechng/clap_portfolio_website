<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_uid',
        'user_email',
        'degree_name',
        'institution_name',
        'start_date',
        'end_date',
    ];
}
