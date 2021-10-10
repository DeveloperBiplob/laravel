<?php

namespace App\Models;

use App\Notifications\AdminEmailVerifyNotification;
use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    

    // Password Hash Mutators-----------//
    public function setPasswordAttribute($value)
    {
        // $value = 'password';
        $this->attributes['password'] = bcrypt($value);
    }

    // Custom Notification 
    public function sendEmailVerificationNotification()
    {
        $this->notify(new AdminEmailVerifyNotification);
    }


    // By defaile ai "sendPasswordResetNotification($token)" notificatin ta Web Grard er jonno kaj kore.
    // But jdoi custom Password reset korte chai ta hole ai Notificatin ta ke Over Right korte hobe.
    // Ata ke model e define kore, Custom akta Notificaion make korte hobe.
    // And seta ke ekhane call kore dite hobe.
    // Same Process Email Verificatin er jonno.

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }


}
