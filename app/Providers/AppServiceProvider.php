<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Menu;
use App\Models\Writer;
use App\Models\Category;
use Illuminate\Support\Facades\View;
// use Illuminate\Pagination\Paginator;
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
        // Paginator::useBootstrap();
        Schema::defaultStringLength(191);
        View::composer('*', function ($view)  {
            $cats="";
            $cats=Category::orderBy('count','DESC')->with('getMenu')->get();

            //  $news=Menu::orderBy('pop','DESC')->get();
            //  $writers=Writer::orderBy('pop','DESC')->get();
            // $news=Menu::orderBy('pop','DESC')->paginate(8);
            $view->with('cats',$cats);

        });
    }
}
