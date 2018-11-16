<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('sitename','Laravel Study');

        //视图Composer
        view()->composer('hello',function($view){
            $view->with('user',array('name'=>'test','avatar'=>'/path/to/test.jpg'));
        });

        /*view()->composer(['hello','home'],function($view){
            $view->with('user',array('name'=>'test','avatar'=>'/path/to/test.jpg'));
        });
        // 传递到所有视图
        view()->composer('*',function($view){
            $view->with('user',array('name'=>'test','avatar'=>'/path/to/test.jpg'));
        });*/
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
