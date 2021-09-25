<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    // Has Many Throtgh-----// Same key Convention Has One Through--//
    // Ata muloth akta table er through te onno akta table access kore.
    // like - A, B, C. 3ta table. akhon jeta hosche ami A theke C ke access korte chachi B table er through te.
    // Ekhane b er sathe kono relation na kore. B er foreignId use kore. A class class thekai C ke access korteci.

    // A = Machanic
    // B = Car
    // C = Owner
    // First parameter holo jei table ke access korte chaschi oi table er name. like - A
    // Second parameter holo jei table er through te jachi sei table er name. like - B
    // Third parameter holo through table er foreginId. like - B er foreignId
    // Fourth parameter holo jei table ke access korte chaschi oi table er foreingId. like - C er foregin_id
    // Baki gulo optional, na dile o hole. protom ta holo ai table e local Key, second ta holo through table er local Key.

    public function shops()
    {
        return $this->hasManyThrough(Shop::class, City::class, 'country_id', 'city_id');
    }
}
