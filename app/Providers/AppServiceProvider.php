<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Pagination\Paginator;
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
        //
        Paginator::useBootstrap();
        view()->composer('layouts.app',function($view){
            $view->with('allCategories', Category::get());
        });
        view()->composer('app.partials.popup',function($view){
            $view->with('allCategories', Category::get());
        });
        view()->composer('app.article.byCategory',function($view){
            $view->with('allTags', Tag::get());
        });
        view()->composer('app.article.byTag',function($view){
            $view->with('allTags', Tag::get());
        });
        view()->composer('app.search.searchResult',function($view){
            $view->with('allTags', Tag::get());
        });
        view()->composer('app.partials.admin.sidebar',function($view){
            $view->with('allCategories', Category::get());
            $view->with('allTags', Tag::get());
        });
       

}
}
