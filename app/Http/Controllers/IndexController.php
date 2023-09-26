<?php

namespace App\Http\Controllers;

use App\Models\PublicServiceInfo;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function getCoordinates()
    {
        $coordinates = PublicServiceInfo::select('coordinateX', 'coordinateY')->get();
        return response()->json($coordinates);
    }
}