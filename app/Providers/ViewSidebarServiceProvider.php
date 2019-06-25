<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\Comment;
use App\Category;
use Illuminate\Support\Facades\View;

class ViewSidebarServiceProvider extends ServiceProvider
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
	    View::composer(
		    '..partials.leftsidebar', 'App\Http\Composers\NavigationComposer'
	    );
	    /*View::composer('', function ($view) {
		    $view->with('test', '123');
        });*/
    }
}
