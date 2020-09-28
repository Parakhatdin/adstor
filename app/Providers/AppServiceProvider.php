<?php

namespace App\Providers;

use App\Repositories\Api\ChannelRepository;
use App\Repositories\Api\PostRepository;
use App\Repositories\Api\PublisherRepository;
use App\Repositories\Api\StatisticRepository;
use App\Repositories\Api\Interfaces\ChannelRepository as ChannelRepositoryInterface;
use App\Repositories\Api\Interfaces\PostRepository as PostRepositoryInterface;
use App\Repositories\Api\Interfaces\PublisherRepository as PublisherRepositoryInterface;
use App\Repositories\Api\Interfaces\StatisticRepository as StatisticRepositoryInterface;

use App\Services\Api\ChannelService;
use App\Services\Api\PostService;
use App\Services\Api\PublisherService;
use App\Services\Api\StatisticService;
use App\Services\Api\Interfaces\ChannelService as ChannelServiceInterface;
use App\Services\Api\Interfaces\PostService as PostServiceInterface;
use App\Services\Api\Interfaces\PublisherService as PublisherServiceInterface;
use App\Services\Api\Interfaces\StatisticService as StatisticServiceInterface;

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

        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(ChannelRepositoryInterface::class, ChannelRepository::class);
        $this->app->bind(PublisherRepositoryInterface::class, PublisherRepository::class);
        $this->app->bind(StatisticRepositoryInterface::class, StatisticRepository::class);
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
