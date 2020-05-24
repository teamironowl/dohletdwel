<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReportForm;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ownerID = auth()->id();

        $reportCases = ReportForm::leftJoin('state_divisions', 'state_divisions.id', 'state_division')
        ->leftJoin('townships', 'townships.id', 'township_id')
        ->select('report_forms.*', 'state_divisions.name as state_division_name', 'townships.name as township_name')
        ->where('owner_id', $ownerID)->get();

        return view('home')->with([
            'report_cases' => $reportCases
        ]);
    }
}
