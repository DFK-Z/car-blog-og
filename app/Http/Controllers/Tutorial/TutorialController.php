<?php

namespace App\Http\Controllers\Tutorial;

use App\Http\Controllers\Controller;

class TutorialController extends Controller
{
    public function index()
    {
        return view('tutorial::index', ['title' => 'Tutorial']);
    }

    public function show()
    {
        return view('tutorial::show', ['title' => 'Tutorial Show']);
    }
}
