<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StateDivision;

class MainPageController extends Controller
{
    public function index()
    {
        return view('welcome')->with([
            'divisions' => StateDivision::orderBy('name', 'desc')->get()
        ]);
    }
}
