<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsController;

Route::prefix('news')->group(function () {
    Route::get('/search/{q}/{pageSize}', [NewsController::class, 'search']);
    Route::get('/top-headlines/{country}/{pageSize}', [NewsController::class, 'topHeadlines']);
    Route::get('/sources/{category}/{country}', [NewsController::class, 'sources']);
});