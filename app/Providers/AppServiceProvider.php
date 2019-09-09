<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register(\Reliese\Coders\CodersServiceProvider::class);
        }
        $this->registerInertia();
        $this->registerWebSockets();
    }

    protected function registerInertia()
    {
        Inertia::version(function () {
            return md5_file(public_path('mix-manifest.json'));
        });
        Inertia::share('app.name', 'Lighthouse - ');
    }

    protected function registerWebSockets()
    {
        $this->app->singleton('websockets.router', function () {
            return new \App\WebSockets\Server\Router();
        });
    }
}
