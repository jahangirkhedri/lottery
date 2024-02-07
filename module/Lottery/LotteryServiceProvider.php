<?php

namespace Module\Lottery;

use Illuminate\Support\ServiceProvider;
use Module\Campaign\Contract\CampaignServiceInterface;
use Module\Campaign\Services\CampaignService;
use Module\Lottery\Contract\LotteryServiceInterface;
use Module\Lottery\Services\LotteryService;

class LotteryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migration');
        $this->app->bind(LotteryServiceInterface::class, LotteryService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
