<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademyInfo;

class AcademyInfoController extends Controller
{
    public function index(Request $request)
    {
        $query = AcademyInfo::query();

        // 페이징 설정
        $academyInfos = $query->paginate(15);

        return view('academy.index', compact('academyInfos'));
    }
    
    public function show($id)
    {
        $academyInfo = AcademyInfo::find($id);
        return view('academy.show', ['academyInfo' => $academyInfo]);
    }
}
