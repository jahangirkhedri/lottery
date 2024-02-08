<?php

namespace Module\Campaign;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Module\Campaign\Contract\CampaignServiceInterface;
use Module\Campaign\Services\CampaignService;

class CampaignServiceProvider extends ServiceProvider
{
    protected string $routeNamespaces = "Module\Campaign\Http\Controllers";
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/Database/migration');
        $this->app->bind(CampaignServiceInterface::class, CampaignService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::prefix('api')->namespace($this->routeNamespaces)
            ->group(__DIR__ . "/routes/api.php");
    }
}
