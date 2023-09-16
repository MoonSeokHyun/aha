<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// 서버측 코드 예시
Route::get('/search', function (Request $request) {
    $query = $request->input('query');
    $display = $request->input('display', 10);

    $client = new \GuzzleHttp\Client();
    $response = $client->get("https://openapi.naver.com/v1/search/blog.json?query={$query}&display={$display}", [
        'headers' => [
            'X-Naver-Client-Id' => env('NAVER_CLIENT_ID2'),  // 기존 ID를 변경
            'X-Naver-Client-Secret' => env('NAVER_CLIENT_SECRET'),
        ]
    ]);

    return $response->getBody();
});
