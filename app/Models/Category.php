<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'user_id', 'slug', 'image'];
    // protected $guarded = [];

    // Defining A Mutator
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }


    // Defining An Accessor
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

}
