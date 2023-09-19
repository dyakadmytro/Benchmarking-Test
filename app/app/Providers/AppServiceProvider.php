<?php

namespace App\Providers;

use App\Contracts\UserRepositoryInterface;
use App\Repositories\UserEloquentRepository;
use App\Services\IPAPIService;
use App\Services\OpenweatherService;
use App\Services\UserWeatherService;
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

        $this->app->bind('weather-provider', function(Application $app) {
            return new UserWeatherService();
        });
        $this->app->bind('weather-client', function(Application $app) {
            $client = new Client();
            $key = config('services.openweather.key');
            return new OpenweatherService($client, $key);
        });
        $this->app->bind('ip-client', function(Application $app) {
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
