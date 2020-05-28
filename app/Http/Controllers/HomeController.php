<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\ReportFormService;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(auth()->user()->isAdmin()){
            return $this->adminPage();
        }

        return $this->normalUser();
    }

    public function normalUser()
    {
        $reportCases = (new ReportFormService)->ownerUserReport();

        return view('home')->with([
            'report_cases' => $reportCases
        ]);
    }

    public function adminPage()
    {
        $reportCases = (new ReportFormService)->allUserReport();

        return view('admin.home')->with([
            'report_cases' => $reportCases
        ]);
    }
}
