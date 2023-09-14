<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChildcareCenter;

class ChildcareCenterController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $centers = ChildcareCenter::paginate(10);
            return response()->json($centers);
        }

        $centers = ChildcareCenter::paginate(10);
        return view('childcare.index', compact('centers'));
    }
}
