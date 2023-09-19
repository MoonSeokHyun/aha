<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kindergarten;
class KindergartenController extends Controller
{
    public function index()
    {
        $kindergartens = Kindergarten::paginate(15);
        return view('kindergarten.index', compact('kindergartens'));
    }

    public function show($id)
{
    $kindergarten = Kindergarten::find($id);
    return view('kindergarten.show', ['kindergarten' => $kindergarten]);
}
}
