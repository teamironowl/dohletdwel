<?php

namespace App\Service;

use App\reportForm;

class ReportFormService
{
    public function reportFormInstance()
    {
        return ReportForm::leftJoin('state_divisions', 'state_divisions.id', 'state_division')
        ->leftJoin('townships', 'townships.id', 'township_id')
        ->select('report_forms.*', 'state_divisions.name as state_division_name', 'townships.name as township_name');
    }

    public function ownerUserReport()
    {
        $reportCases = $this->reportFormInstance()->where('owner_id', auth()->id())->get();

        return $reportCases;
    }

    public function allUserReport()
    {
        $reportCases = $this->reportFormInstance()->get();

        return $reportCases;
    }

    public function getWithPaginate()
    {
        $reportCases = $this->reportFormInstance()->paginate(5);

        return $reportCases;
    }

    public function approve($id)
    {
        ReportForm::find($id)->update([
            'status' => 2
        ]);
    }

    public function cancel($id)
    {
        ReportForm::find($id)->update([
            'status' => 3
        ]);
    }

    public function close($id)
    {
        ReportForm::find($id)->update([
            'status' => 4
        ]);
    }

    public function restore($id)
    {
        ReportForm::find($id)->update([
            'status' => 1
        ]);
    }

    public function re_open($id)
    {
        ReportForm::find($id)->update([
            'status' => 2
        ]);
    }
}