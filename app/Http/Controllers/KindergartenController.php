<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kindergarten;
class KindergartenController extends Controller
{


    public function index()
    {
        $kindergartens = Kindergarten::all();
        return view('kindergarten.index', ['kindergartens' => $kindergartens]);
    }
    
    public function show($id)
{
    $kindergarten = Kindergarten::find($id);
    return view('kindergarten.show', ['kindergarten' => $kindergarten]);
}
}
