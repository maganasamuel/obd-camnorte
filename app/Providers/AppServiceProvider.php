<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Xvladqt\Faker\LoremFlickrProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        fake()->addProvider(new LoremFlickrProvider(fake()));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();

        Vite::macro('image', fn (string $asset) => $this->asset("resources/images/{$asset}"));
    }
}
