<?php

namespace App\Providers;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserEloquentRepository;
use App\Services\IPAPIService;
use App\Services\OpenweatherService;
use GuzzleHttp\Client;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserEloquentRepository::class);
        $this->app->alias(UserRepositoryInterface::class, 'user-repository');

        $this->app->bind('openweather', function(Application $app) {
            $client = new Client();
            $key = config('services.openweather.key');
            return new OpenweatherService($client, $key);
        });
        $this->app->bind('ipapi', function(Application $app) {
            $client = new Client();
            return new IPAPIService($client);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
