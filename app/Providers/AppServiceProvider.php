<?php

namespace App\Providers;

use App\Services\API\ChannelService;
use App\Services\API\PostService;
use App\Services\API\PublisherService;
use App\Services\API\StatisticService;
use App\Services\API\Interfaces\ChannelService as ChannelServiceInterface;
use App\Services\API\Interfaces\PostService as PostServiceInterface;
use App\Services\API\Interfaces\PublisherService as PublisherServiceInterface;
use App\Services\API\Interfaces\StatisticService as StatisticServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PostServiceInterface::class, PostService::class);
        $this->app->bind(ChannelServiceInterface::class, ChannelService::class);
        $this->app->bind(PublisherServiceInterface::class, PublisherService::class);
        $this->app->bind(StatisticServiceInterface::class, StatisticService::class);
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
