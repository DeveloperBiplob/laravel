<?php

namespace App\Models;

use App\Scopes\ViewScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $guarded = [];

    // Define Custom tabel name 
    // protected $table = 'my_flights';

    // Define Custom Primary Key
    // protected $primaryKey = 'flight_id';

    // By default value insert kore
    // protected $attributes = [
    //     'price' => 100,
    // ];


    //----- scopes define -------//

    public static function booted()
    {
        // Global scope clas use kore
        static::addGlobalScope(new ViewScope);


    }




}
