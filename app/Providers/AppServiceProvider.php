<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

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
        Schema::defaultStringLength(191);

        View::composer(['partials.sidebar', 'lists.categories'], \App\ViewComposers\CategoryComposer::class);
        View::composer('lists.roles', \App\ViewComposers\RolesComposer::class);
        View::composer('partials.sidebar', \App\ViewComposers\CommentComposer::class);
    }
}
