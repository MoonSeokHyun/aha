<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameResultController;
use App\Http\Controllers\ChildcareCenterController;
use App\Http\Controllers\KindergartenController;
use App\Http\Controllers\AcademyInfoController;
use App\Http\Controllers\SitemapController;

// Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// Game Results
Route::group(['prefix' => 'win-rate'], function () {
    Route::get('/', [GameResultController::class, 'showWinRate']);
    Route::get('/add', function () {
        return view('game.add_game_results');
    });
    Route::post('/save', [GameResultController::class, 'saveGameResults']);
});

// Childcare Centers
Route::group(['prefix' => 'childcare'], function () {
    Route::get('/', [ChildcareCenterController::class, 'index']);
    Route::get('/{id}', [ChildcareCenterController::class, 'show']);
});

// Kindergartens
Route::group(['prefix' => 'kindergartens'], function () {
    Route::get('/', [KindergartenController::class, 'index']);
    Route::get('/{id}', [KindergartenController::class, 'show']);
});

// Academy Info
Route::group(['prefix' => 'academy_info'], function () {
    Route::get('/', [AcademyInfoController::class, 'index']);
    Route::get('/{id}', [AcademyInfoController::class, 'show']);
});

// Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
