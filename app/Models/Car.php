<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ['machanic_id', 'name'];

    // Has one
    public function owner()
    {
        return $this->hasOne(Owner::class, 'car_id', 'id');
    }
}
