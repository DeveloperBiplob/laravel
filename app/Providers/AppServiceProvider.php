<?php

namespace App\Providers;

use App\View\Components\Alert;
use App\View\Components\NotificationComponenet;
use App\View\Composers\ViewComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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



        // Custom Blade Directives-----------//

        Blade::directive('datetime', function ($expression) {
            return "<?php echo ($expression)->format('m/d/Y H:i'); ?>";
        });

        Blade::directive('customUpperCase', function($expression) {
            return "<?php echo strtoupper($expression) ?>";
        });

        
        Blade::directive('route', function ($value) {
            return "<?php echo route($value) ?>";
        });



        // Component------------//
        // Jodi component er akta Custom Name define korte chai, and sei name e component ke access korte chai. 
        // Ta hole shudu ai kane Register korbo. noy toh kora lagne na. jus component er name dite access korbo.

        // Akhon ai component ke access korte chaile <x-ComponentAlert/> ai vabe call korte hobe. 
        Blade::component('ComponentAlert', Alert::class); 
        Blade::component('Notification', NotificationComponenet::class); 

        
    }
}
