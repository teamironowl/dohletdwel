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
        if($this->authUser()->isAdmin()){
            return $this->adminPage();
        }

        return $this->normalUser();
    }

    public function normalUser()
    {
        $reportCases = $this->reportFormInstance()->where('owner_id', $this->authUser()->id)->get();

        return view('home')->with([
            'report_cases' => $reportCases
        ]);
    }

    public function adminPage()
    {
        $reportCases = $this->reportFormInstance()->get();

        return view('admin.home')->with([
            'report_cases' => $reportCases
        ]);
    }

    public function authUser()
    {
        return auth()->user();
    }

    public function reportFormInstance()
    {
        return ReportForm::leftJoin('state_divisions', 'state_divisions.id', 'state_division')
        ->leftJoin('townships', 'townships.id', 'township_id')
        ->select('report_forms.*', 'state_divisions.name as state_division_name', 'townships.name as township_name');
    }
}
