<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Users()
    {
        // return $this->belongsToMany(User::class, 'skill_user');

        // return $this->belongsToMany(User::class, 'skill_user')->withTimestamps();

        // return $this->belongsToMany(User::class, 'skill_user')->withPivot('view');

        return $this->belongsToMany(User::class, 'skill_user')->withPivot('view')->as('my_pivot');
    }
}
