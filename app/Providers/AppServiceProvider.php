<?php

namespace App\Providers;

use App\View\Composers\ViewComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // View share-----//
        // view share e kono data define kore dile ta hole application e access kora jay.
        // But ata amara extra akta ServiceProvider create kore kaj korbo.

        // View::share('test', 'This is our Global Varible');
        // view()->share('test', 'This is our Global Varible');





        // Create A Extra View Composer Class--------//

        //**  Jei kono ServiceProvider e call kore dile e hoy. like - AppServiceProvider
        //** Or amara jodi kono serviceProvider create kore thaki oita call korle o hobe.

        // Ai Khane just class ta call kore dite hobe--
        // View::composer('viewComponent.index', ViewComposer::class);
    }
}
