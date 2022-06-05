<?php

namespace App\Providers;

use App\Http\Resources\BookResource;
use App\Http\Resources\GenreResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        BookResource::withoutWrapping();
        GenreResource::withoutWrapping();
    }
}
