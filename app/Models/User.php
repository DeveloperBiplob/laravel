<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
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

    // One to one relationship---------//
    
    public function profile(){
        // First perameter foreignId And Second perameter holo local key. mane Id.
        // Jodi convention flow kore relationship use kori ta hole foreignId bole dewa lage na,
        // se somoy laravel je ta kore model er smaller form er sathe "_Id" ai surFix ta add kore nei, like = user_id.
        // R jodi convention flow na kori tahole obossoy foreignId bole dite hobe.

        // return $this->hasOne(profile::class, 'user_id', 'id');

        // withDefault(); ta use korle value na thakle o blade file e error show korbe na.
        // return $this->hasOne(profile::class, 'user_id', 'id')->withDefault();

        // withDefault(); E Defalut value o pass kore dewa jay.
        return $this->hasOne(profile::class, 'user_id', 'id')->withDefault([ 
            'phone' => 'Default phone number 01643381009',
            'view' => 2540,
            'address' => 'Dhaka'
        ]); 
    }


    // Eger load define ----------//
    // model e define kore dile r data get korar somoy with() use kora lagebe na.

    // Jodi multiple model er data egger load kori, tokhon jodi kono model er data dorkar na pore,
    // Tokhon jate shudu shudu Query na hoy ti get korar somoy Controlller e " without(['category', 'subCateogy']) " bole dibo, konta kontar data dorkar nei.
    // Chaile " withOnly() " use korte pari. jeta lagbe shudu seta bole dibo.

    protected $with = ['profile'];
}
