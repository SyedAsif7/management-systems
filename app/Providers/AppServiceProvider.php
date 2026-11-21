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
        if (
            (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ||
            request()->server('HTTP_X_FORWARDED_PROTO') === 'https' ||
            request()->isSecure() ||
            str_contains(request()->header('host', ''), 'onrender.com') ||
            str_contains(request()->header('host', ''), 'vercel.app') ||
            str_contains(request()->header('host', ''), 'trycloudflare.com')
        ) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
        ini_set('display_errors', '0');

        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
