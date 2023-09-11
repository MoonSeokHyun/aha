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

    return view('win_rate', ['results' => $results]);
}
}
