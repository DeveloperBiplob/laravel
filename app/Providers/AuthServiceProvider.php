<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\User;
use App\Models\UserSkill;
use App\Policies\SkillPolicy;
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

        // Create policy
        // php artisan make:policy PostPolicy --model=Post

        // Protome AuthServiceProvider e Policy ta ke Registter kore nite hobe.
        // key valu wise register korbo, protome Model er name, tar por Policy er name. 
        // jei model er sathe policy take use korte chaschi oi model er name. akta model er joono akta policy use korbo.
        // Ploicy ke view file and Controller / Middleware e prevent korbo.

        // Register policy
        UserSkill::class => SkillPolicy::class,


        // Via Controller------//
        // $this->authorize('update', $skill);



        // Use in Middleware------//
        // Route::put('/post/{post}', function (Post $post) {
        //     // The current user may update the post...
        // })->middleware('can:update,post');


        // Via Blade Templates-----//
        // @can('update', $post)
        //     <!-- The current user can update the post... -->
        // @elsecan('create', App\Models\Post::class)
        //     <!-- The current user can create new posts... -->
        // @else
        //     <!-- ... -->
        // @endcan

        // @cannot('update', $post)
        //     <!-- The current user cannot update the post... -->
        // @elsecannot('create', App\Models\Post::class)
        //     <!-- The current user cannot create new posts... -->
        // @endcannot


        // @if (Auth::user()->can('update', $post))
        //     <!-- The current user can update the post... -->
        // @endif

        // @unless (Auth::user()->can('update', $post))
        //     <!-- The current user cannot update the post... -->
        // @endunless


        // @canany(['update', 'view', 'delete'], $post)
        //     <!-- The current user can update, view, or delete the post... -->
        // @elsecanany(['create'], \App\Models\Post::class)
        //     <!-- The current user can create a post... -->
        // @endcanany

        // @can('create', App\Models\Post::class)
        //     <!-- The current user can create posts... -->
        // @endcan

        // @cannot('create', App\Models\Post::class)
        //     <!-- The current user can't create posts... -->
        // @endcannot

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
