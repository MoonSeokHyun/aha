<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kindergarten;

class KindergartenController extends Controller
{
    public function index(Request $request)
    {
        $query = Kindergarten::query();
    
        if ($request->has('region')) {
            $query->where('address', 'like', '%' . $request->region . '%');
        }
    
$kindergartens = $query->paginate(15);

return view('kindergarten.index', compact('kindergartens'));
    }

    public function show($id)
    {
        $kindergarten = Kindergarten::find($id);
        return view('kindergarten.show', ['kindergarten' => $kindergarten]);
    }
}
