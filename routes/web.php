<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameResultController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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