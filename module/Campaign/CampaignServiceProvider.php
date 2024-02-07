<?php

namespace Module\Campaign;

use Illuminate\Support\ServiceProvider;
use Module\Campaign\Contract\CampaignServiceInterface;
use Module\Campaign\Services\CampaignService;

class CampaignServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migration');
        $this->app->bind(CampaignServiceInterface::class, CampaignService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
