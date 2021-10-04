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


    // One to Many relationship / Has Many Relationship---------//

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }


    // Latest Of many----------//
    // kono akta user er under e shorbo ses jei post ta create hoiche seta return kore. latest post ta return kore
    // By default ai method ta crated_at and updated_at er upor base kore data dey.

    public function latestPost()
    {
        return $this->hasOne(Post::class)->latestOfMany();
    }


    // Oldest Of Many---------//
    // kono akta user er under e sobar prothom jei post ta create hoiche seta return kore. oldes post return kore.
    // By default ai method ta crated_at and updated_at er upor base kore data dey.
    public function oldestPost()
    {
        return $this->hasOne(Post::class)->oldestOfMany();
    }


    // OfMany------------------//
    // Column er upor condition kore data tule ane.
    // Isse moto condition use korte pare jeta amar dorkar porbe.
    // Like ekhane ami shob theke besi jei view ta ache sei ta show korchi.
    public function largePostView()
    {
        return $this->hasOne(Post::class)->ofMany('view', 'max');
    }

    // Like ekhane ami shob theke kom jei view ta ache sei ta show korchi
    public function lowPostView()
    {
        return $this->hasOne(Post::class)->ofMany('view', 'min');
    }


    // Many to mamy Relationship / BelongToMany------//-----------------//-----------------//

    public function skills()
    {
        // return $this->belongsToMany(Skill::class, 'skill_user');

        // Time stramp add korte chaile.

        // return $this->belongsToMany(Skill::class, 'skill_user')->withTimestamps(); 



        // Pivot table e data Insert IN Extra column.
        // withPivot('columnName') // column name ta bole dite hobe. karon pivot table ForeginId chara onno kono fild e track kore na.
        // Multiple Column hole array diye dibo. withPivot(['view', 'status'])

        // return $this->belongsToMany(Skill::class, 'skill_user')->withTimestamps()->withPivot('view'); 



        // Pivot Table er key customize-------//
        // Bydefault pivot table er data access korte chaile pivot likhle hoy.{{ $skill->pivot->view }}
        // Customize kore as('my_pivot') modde jei key ta dibo, access korar somoy oi diye access korte hobe.{{ $skill->my_pivot->view }}

        return $this->belongsToMany(Skill::class, 'skill_user')->withTimestamps()->withPivot('view')->as('my_pivot'); 
    }



    // Password Hash Mutators-----------//
    public function setPasswordAttribute($value)
    {
        // $value = 'password';
        $this->attributes['password'] = bcrypt($value);
    }


}
