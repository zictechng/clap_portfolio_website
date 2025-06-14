<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'lname',
        'email',
        'password',
        'user_otp',
        'acct_status',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function projects()
        {
            return $this->hasMany(Project::class, 'user_uid');
        }

        public function education()
        {
            return $this->hasMany(Education::class, 'user_uid');
        }

        public function workExperience()
        {
            return $this->hasMany(WorkExperience::class, 'user_uid');
        }

        public function socialLink()
        {
            return $this->hasOne(SocialLink::class, 'user_uid');
        }

        // public function followers()
        // {
        //     return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
        // }
}
