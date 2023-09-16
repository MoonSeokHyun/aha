<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameResultController;
use App\Http\Controllers\ChildcareCenterController;
use App\Http\Controllers\KindergartenController;
use App\Http\Controllers\AcademyInfoController;

Route::get('/', function () {
    return view('welcome');
});

// 게임 결과 이동
Route::get('/win-rate', [GameResultController::class, 'showWinRate']);
// 게임 입력
Route::get('/add-game-results', function () {
    return view('game.add_game_results');  
});


// 저장 
Route::post('/save-game-results', [GameResultController::class, 'saveGameResults']);


// 어린이집 childcenter board
Route::get('/childcare', [ChildcareCenterController::class, 'index']);
Route::get('/childcare/{id}', [ChildcareCenterController::class, 'show']);


// 유치원

Route::get('/kindergartens', [KindergartenController::class, 'index']);
Route::get('/kindergartens/{id}',[KindergartenController::class, 'show']);

// 학원
Route::get('/academy_info', [AcademyInfoController::class, 'index']);
Route::get('/academy_info/{id}', [AcademyInfoController::class, 'show']);
