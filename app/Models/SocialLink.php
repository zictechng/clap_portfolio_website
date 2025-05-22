<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'social_youtube',
        'social_linkedin',
        'social_github',
        'social_company',
        'user_email',
        'user_uid',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
