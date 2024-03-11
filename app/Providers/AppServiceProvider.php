<?php

namespace App\Providers;

use Carbon\Carbon; // harus import ini juga utk mengubah waktu
use Illuminate\Pagination\Paginator; // utk memakai pagination boostrap
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
        // utk mngatur waktu indonesia
        config(['app.local' => 'id']);
        Carbon::setLocale('id');

        // Paginator::useBootstrapFive();
        Paginator::useBootstrapFive();
    }
}
