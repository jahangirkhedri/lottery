<?php

use Illuminate\Support\Facades\Route;
use Module\Lottery\Http\Controllers\LotteryController;

Route::middleware('auth:sanctum')->group(function (){
    Route::get('lottery/{id}',[LotteryController::class,'lottery']);
});
