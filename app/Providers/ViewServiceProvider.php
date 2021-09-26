<?php

namespace App\Providers;

use App\Models\Country;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

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
    }
}
