<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // mengubah konfigurasi layout blade
        Blade::component(
            'components/layout',
            // 'layout',
        );

        Route::bind('post', function ($value) {
            return \App\Models\Post::where('slug', $value)->firstOrFail();
        });
    }
}
