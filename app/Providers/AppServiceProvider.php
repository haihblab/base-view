<?php

namespace App\Providers;

use App\Contracts\Services\Api\UserServiceInterface;
use App\Services\Api\UserService;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\Web\Admin\HomeServiceInterface;
use App\Services\Web\Admin\HomeService;
use App\Contracts\Services\Web\Admin\CategoryServiceInterface;
use App\Services\Web\Admin\CategoryService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $services = [
            [
                UserServiceInterface::class,
                UserService::class
            ],
            [
                HomeServiceInterface::class,
                HomeService::class
            ],
            [
                CategoryServiceInterface::class,
                CategoryService::class
            ],
        ];
        foreach ($services as $service) {
            $this->app->bind(
                $service[0],
                $service[1]
            );
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
