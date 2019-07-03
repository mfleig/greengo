<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Categoria;


class CategoriaProvider extends ServiceProvider
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
        view()->composer('*',function($view) {
          $view->with('arraycategoria', Categoria::all());
        });
    }
}
