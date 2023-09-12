<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameResultController extends Controller
{
    
    public function showWinRate()
{
    $results = DB::select("
    SELECT TRIM(team1) AS trimmed_team1, TRIM(team2) AS trimmed_team2, 
    SUM(CASE WHEN recode = '승리' THEN 1 ELSE 0 END) AS wins,
    COUNT(*) AS total_games,
    CONCAT(ROUND((SUM(CASE WHEN recode = '승리' THEN 1 ELSE 0 END) / COUNT(*)) * 100, 2), '%') AS win_rate
    FROM game_results
    GROUP BY trimmed_team1, trimmed_team2
    ");

    return view('game.win_rate', ['results' => $results]);
}

public function saveGameResults(Request $request)
{
    // 폼에서 전송된 데이터를 받습니다.
    $gameResults = $request->input('gameResults');

    // 데이터베이스에 저장하는 로직
    foreach ($gameResults as $result) {
        DB::table('game_results')->insert([
            'team1' => $result['team1'],
            'team2' => $result['team2'],
            'team1_score' => $result['team1_score'],
            'team2_score' => $result['team2_score'],
            'recode' => $result['team1_score'] > $result['team2_score'] ? '승리' : '패배'
        ]);
    }

    return redirect('/add-game-results')->with('status', '게임 결과가 성공적으로 저장되었습니다.');
}
}

