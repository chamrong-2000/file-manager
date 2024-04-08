<?php

namespace App\Models;

use App\Notifications\UserResetPasswordNotification;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'email',
        'avatar',
        'password',
        'google2fa_status',
        'google2fa_secret',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'google2fa_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'address' => 'object',
        'email_verified_at' => 'datetime',
    ];

    /**
     * Decrypt the user's google_2fa secret.
     *
     * @param  string  $value
     * @return string
     */
    public function getGoogle2faSecretAttribute($value)
    {
        return decrypt($value);
    }

    /**
     * Send Password Reset Notification.
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPasswordNotification($token));
    }

    /**
     * Send Email Verification Notification.
     */
    public function sendEmailVerificationNotification()
    {
        if (settings('website_email_verify_status')) {
            $this->notify(new VerifyEmailNotification());
        }
    }

    /**
     * Relationships
     */
    public function logs()
    {
        return $this->hasMany(UserLog::class, 'id');
    }

    public function socialProviders()
    {
        return $this->hasMany(SocialProvider::class, 'user_id', 'id');
    }

    public function fileEntries()
    {
        return $this->hasMany(FileEntry::class, 'user_id', 'id');
    }
}
