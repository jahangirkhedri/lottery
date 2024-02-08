<?php

use Illuminate\Support\Facades\Route;
use Module\Campaign\Http\Controllers\CampaignController;

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('campaigns', CampaignController::class);
});
