<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Authorization mane holo onomodor / permition.
        // Ata Gate and Policy 2vabe e kora jay.
        // Use korar jonno migrate file e Role name akti fild add korte hobe, jar upor base kore kaj korbo.
        // And jei table e upor condition gulo apply korbo sei table e akta foreingId Define kore dite hobe.
        // tar pro porvider/AuthServiceProvider e Business logic gulo apply korte hobe.

        // View file e use korte hoy @can('isAdmin) Allow @endCan

        // Controller e aki vabe business logic gulo likhte pari.
        // Jodi conditionn ta match kore ta hole inche jabe, na hole 404 eror show krbe.
        // Mane holo jodi User e role admin hoy ta hole ta Create page e jete dibe, na hole 404 errow show korabe.
        // Gate::allows('isAdmin') ? Response::allow() : abort(404);

        // Route e o use korte pari


        Gate::define('isAdmin', function($user){
            return $user->role === 'admin';
        });

        Gate::define('isEditor', function($user){
            return $user->role === 'editor';
        });

        Gate::define('isModerator', function($user){
            return $user->role === 'moderator';
        });

        // Jei model niye kaj korbo seta ke type entry kore nibo, Use er or Admin or Techer.
        // Ekhane logic ta ki hosche, jodi user table er id sathe Category table er user_id match kore ta hole oi use ke post update korte dibe.
        Gate::define('update-category', function (User $user, Category $category) {
            return $user->id === $category->user_id;
        });
    }
}
