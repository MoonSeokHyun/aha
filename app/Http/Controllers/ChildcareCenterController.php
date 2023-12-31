<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChildcareCenter;

class ChildcareCenterController extends Controller
{
    public function index(Request $request)
    {
        $query = ChildcareCenter::query();
    
        if ($request->ajax()) {
            if ($request->has('region')) {
                $query->where('address', 'like', '%' . $request->region . '%');
            }
            $centers = $query->paginate(10);
            return response()->json($centers);
        }
    
        $centers = $query->paginate(10);
        return view('childcare.index', compact('centers'));
    }


    public function show($id)
{
    $center = ChildcareCenter::find($id);
    if ($center === null) {
        return redirect('/childcare')->with('error', 'Center not found');
    }
    return view('childcare.show', compact('center'));
}
}

