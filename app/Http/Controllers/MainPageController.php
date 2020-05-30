<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\StateDivisionService;

class MainPageController extends Controller
{
    public function index()
    {
        $all_divisions = (new StateDivisionService)->get();

        $divisions = (new StateDivisionService)->withTotalCases();

        return view('welcome')->with([
            'divisions' => $divisions,
            'all_divisions' => $all_divisions
        ]);
    }
}
