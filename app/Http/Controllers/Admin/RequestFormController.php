<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\ReportFormService;

class RequestFormController extends Controller
{
    public function index()
    {
        $reportCases = (new ReportFormService)->getWithPaginate();

        return view('admin.request_form')->with([
            'report_cases' => $reportCases
        ]);
    }

    public function approve($id)
    {
        (new ReportFormService)->approve($id);

        return back();
    }

    public function cancel($id)
    {
        (new ReportFormService)->cancel($id);

        return back();
    }

    public function close($id)
    {
        (new ReportFormService)->close($id);

        return back();
    }

    public function restore($id)
    {
        (new ReportFormService)->restore($id);

        return back();
    }

    public function re_open($id)
    {
        (new ReportFormService)->re_open($id);

        return back();
    }
}
