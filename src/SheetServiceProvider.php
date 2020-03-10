<?php

namespace Devsheet\Spreadsheet;

use Illuminate\Support\ServiceProvider;

class SheetServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Routes of our component
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        // Views(interface)
        $this->loadViewsFrom(__DIR__.'/resources/views', 'spreadsheet');

        // Migrations for the database
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/devsheet/spreadsheet'),
        ]);

        $this->publishes([
            __DIR__.'/imports' => base_path('App/imports')
        ]);

        $this->publishes([
            __DIR__.'/Http/Controllers' => base_path('app/http/controllers')
        ]);

        $this->publishes([
            __DIR__.'/models' => base_path('App')
        ]);

        $this->publishes([
            __DIR__.'/database/migrations/' => database_path('migrations')
        ], 'migrations');
    }

    public function register()
    {
        //$this->app->make('Devsheet\Spreadsheet\Http\Controllers\SheetController');
    }
    
}
