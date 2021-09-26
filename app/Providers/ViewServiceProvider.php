<?php

namespace App\Providers;

use App\Models\Country;
use App\Models\User;
use App\View\Composers\ViewComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // service provider create korar por obosoy seta ke config/app.php te register kore nite hobe.
        // View share e kono data define korle seta all view file e available. 
        // Disadvantage holo jei view te data gulo lagbe na sei view o data gulo available.
        // Se khetre shudu shudu database e request jasche and extra Query hosche.
        // Tai view share shudu ai somoy use korbe, jodi same data shob gulo view file e dorkar pore.

        // view()->share('test', 'This is our Global Varible');

        // view()->share('users', User::get());




        // View Composer-------------//
        // View composer jeta kore ta holo jei view te data gulo dorkar shudu oi view te data gulo pass kore.
        // Composer er modde view file e name ta pass kore dite hoy, jei view te data pass korte chaschi. composer('viewOne')
        // Multiple view file e data pass korete chaile Array er modde View gulor name bole dibo. composer(['viewOne', 'viewTwo])
        // Jodi kono Folder er shob gulu view file e data ta pass korte chai tile shudu GlobalSelector * use korlei hobe. composer('viewComponent.*')

        // Singel View Pass in Data------//
        // view()->composer('viewComponent.index', function($view){
        //     $view->with('globalUsers', User::get());
        // });

        // Multiple View Pass in Data------//
        // view()->composer(['viewComponent.index', 'viewComponent.create'], function($view){
        //     $view->with('globalUsers', User::get());
        // });

        // Specific Folder er all View te Pass in Data-------//
        // view()->composer('viewComponent.*', function($view){
        //     $view->with('globalUsers', User::get());
        // });

        // Create A Extra View Composer Class-------------//
        // Amra chaile akta dedicatet Class file create kore logic gulo likhte pari. ServiceProvider e atto logic na likhe.
        // Tar jono amader App Folder e modde View name akta folder crete korte hobe, tar modde Composers name ro akta foleder create korte hobe.
        // Aibar Composers folder e modde akta class file create kore Logic gulo define korbo. namespace App\View\Composers;

        // **  Jei kono ServiceProvider e call kore dile e hoy. like - AppServiceProvider
        // ** Or amara jodi kono serviceProvider create kore thaki oita call korle o hobe.
        // Ai Khane just class ta call kore dite hobe

        View::composer('viewComponent.index', ViewComposer::class);

        // Same Process Miltiple view file hole Array pass kore dibo--
        // View::composer(['viewOne', 'viewTwo'], ViewComposer::class);

        // Full folder e pass korte chaile * use korbo --
        // View::composer(['viewOne', 'viewComposer*'], ViewComposer::class);











    }
}
