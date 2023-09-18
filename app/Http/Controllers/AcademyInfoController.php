<?php

namespace App\Http\Controllers;

use App\Models\AcademyInfo;  // <-- Make sure this line is here
use Illuminate\Http\Request;

class AcademyInfoController extends Controller
{
    public function index()
    {
        $academyInfos = AcademyInfo::paginate(15);
        return view('academy.index', compact('academyInfos'));
    }    
}