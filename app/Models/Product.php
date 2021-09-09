<?php

namespace App\Models;

use App\Events\DataCreateEvent;
use App\Scopes\ViewScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

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

    // public static function booted()
    // {
    //     // Global scope clas use kore
    //     // static::addGlobalScope(new ViewScope);

    //     // Normaliy Function use kore
    //     // static::addGlobalScope('lessThenFifty', function (Builder $builder) {
    //     //     $builder->where('view', '>', 50);
    //     // });
    // }



    //----- Define Local scopes -------//
    public function scopeLowesAmount($query) // Ekhane scope ta constant thakbe baki ta condition er upor base kore isse moto add korbo.['scope'LowesAmount]
    {
        return $query->where('price', '<', 40);
    }

    public function scopeHightAmount($query) // Ekhane scope ta constant thakbe baki ta condition er upor base kore isse moto add korbo.['scope'HeightAmount]
    {
        return $query->where('price', '>', 40);
    }



    //----- Define Dynamic Scopes -------//
    public function scopeLowesPrice($query, $price)
    {
        return $query->where('price', '<', $price);
    }


    public function scopeStatus($query, $status)
    {
        return $query->where('status', '=', $status);
    }


    // Model Event Wiht Define Dadicated Class-----------//
    // kono akta kaj complite howar por kicho korte cahile ai Event er maddome korbo.
    // Data ta create howar por ki korte chaschi seta Event class er modde bole dibo.
    // like- Data save howar por user ke mail send kora, kono notification show kora.
    // Eikhane $dispatchsEvent e sob Event guloke defien kore dibo. sathe method define kore dibo. 
    // Like - create hole kon Event ta kaj korbe, ta update hole konta, or delete hole konta. ai vabe.

    protected $dispatchesEvents = [
        'created' => DataCreateEvent::class,  

    ];



    // Model Event Define With Closer-----------//
    // Ai vabe use korle Extra class make korte hobe na, just booted function ki korte chai bole dibo.
    protected static function booted()
    {
        static::created(function ($product) {
            info('Product Data created Successfllly by Closer');
        });

        static::retrieved(function ($product) { // get korle ai retrieved ta call hobe.
            info('Product Data Show');
        });
    }


}
