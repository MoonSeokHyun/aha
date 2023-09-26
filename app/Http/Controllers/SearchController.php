<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Correct import here
use App\Models\ChildcareCenter;
use App\Models\Kindergarten;
use App\Models\AcademyInfo;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        DB::enableQueryLog();  // 쿼리 로깅을 활성화
        $searchTerm = $request->input('academy_name');

        $academy_info = DB::table('academy_info')->where('academy_name', 'like', '%'.$searchTerm.'%')->take(10)->get();
        $childcarecenter = DB::table('childcarecenter')->where('name', 'like', '%'.$searchTerm.'%')->take(10)->get();
        $kindergarten = DB::table('kindergarten')->where('KindergartenName', 'like', '%'.$searchTerm.'%')->take(10)->get();

        return view('search.results', compact('academy_info', 'childcarecenter', 'kindergarten'));
    }
}
