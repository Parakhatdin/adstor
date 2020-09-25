<?php

namespace App\Providers;

use App\Repositories\API\v1\ChannelRepository;
use App\Repositories\API\v1\PostRepository;
use App\Repositories\API\v1\PublisherRepository;
use App\Repositories\API\v1\StatisticRepository;
use App\Repositories\API\v1\Interfaces\ChannelRepository as ChannelRepositoryInterface;
use App\Repositories\API\v1\Interfaces\PostRepository as PostRepositoryInterface;
use App\Repositories\API\v1\Interfaces\PublisherRepository as PublisherRepositoryInterface;
use App\Repositories\API\v1\Interfaces\StatisticRepository as StatisticRepositoryInterface;

use App\Services\API\v1\ChannelService;
use App\Services\API\v1\PostService;
use App\Services\API\v1\PublisherService;
use App\Services\API\v1\StatisticService;
use App\Services\API\v1\Interfaces\ChannelService as ChannelServiceInterface;
use App\Services\API\v1\Interfaces\PostService as PostServiceInterface;
use App\Services\API\v1\Interfaces\PublisherService as PublisherServiceInterface;
use App\Services\API\v1\Interfaces\StatisticService as StatisticServiceInterface;

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
