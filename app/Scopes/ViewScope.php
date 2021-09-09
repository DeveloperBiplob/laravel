<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ViewScope implements Scope
{
    /*
    * Scope use korar mol karon holo kicho condition age theke define kore raha jay.
    * ja amra model e define kore use korte pare.
    * ate kore bar bar aki condition na likhe shudu scope class ta use kore kaj ta sohoj korte pari.
    */
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('view', '<', 50);
    }
}