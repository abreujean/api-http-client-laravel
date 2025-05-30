<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsController;

Route::prefix('news')->group(function () {
    Route::get('/search', [NewsController::class, 'search']);
    Route::get('/top-headlines', [NewsController::class, 'topHeadlines']);
    Route::get('/sources', [NewsController::class, 'sources']);
});