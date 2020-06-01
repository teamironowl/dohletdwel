<?php

namespace App\Service;

use App\StateDivision;
use App\ReportForm;
use DB;

class StateDivisionService
{
    public function get()
    {
        return StateDivision::orderBy('name', 'desc')->get();    
    }

    public function withTotalCases()
    {
        $stateWithTotalCase = StateDivision::with('medias:file_path,files.created_at')
        ->join('report_forms', 'report_forms.state_division', 'state_divisions.id')
        ->select('report_forms.id', 'state_divisions.name', DB::raw('count(report_forms.id) as cases'), 'state_division')
        ->where('report_forms.status', config()->get('constants.cases.STATUS_APPROVE'))
        ->groupBy('name')
        ->orderBy('cases', 'desc')
        ->get();

        return $stateWithTotalCase;
    }

    public function getCasesByDivisionId($id)
    {
        $stateWithTotalCase =  ReportForm::with('medias')
        ->leftJoin('state_divisions', 'state_divisions.id', 'report_forms.state_division')
        ->leftJoin('townships', 'townships.id', 'report_forms.township_id')
        ->select('report_forms.*', 'state_divisions.name as division_name', 'townships.name as township_name')
        ->where('report_forms.status', config()->get('constants.cases.STATUS_APPROVE'))
        ->where('report_forms.state_division', $id)->paginate(5);

        return $stateWithTotalCase;
    }
}