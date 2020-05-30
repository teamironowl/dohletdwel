<?php

namespace App\Service;

use App\StateDivision;
use DB;

class StateDivisionService
{
    public function get()
    {
        return StateDivision::orderBy('name', 'desc')->get();    
    }

    public function withTotalCases()
    {
        $stateWithTotalCase = StateDivision::join('report_forms', 'report_forms.state_division', 'state_divisions.id')
        ->select('state_divisions.id', 'state_divisions.name', DB::raw('count(report_forms.id) as cases'))
        ->where('report_forms.status', config()->get('constants.cases.STATUS_APPROVE'))
        ->groupBy('name')
        ->orderBy('cases', 'desc')
        ->get();

        return $stateWithTotalCase;
    }

    public function getCasesByDivisionId($id)
    {
        $stateWithTotalCase = StateDivision::join('report_forms', 'report_forms.state_division', 'state_divisions.id')
        ->join('townships', 'townships.id', 'report_forms.township_id')
        ->select('report_forms.*', 'state_divisions.name as division_name', 'townships.name as township_name')
        ->where('report_forms.status', config()->get('constants.cases.STATUS_APPROVE'))
        ->where('state_divisions.id', $id)
        ->paginate(5);

        return $stateWithTotalCase;
    }
}