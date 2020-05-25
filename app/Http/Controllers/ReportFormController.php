<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReportForm;
use Validator;

class ReportFormController extends Controller
{
    public function store(Request $request)
    {
        $request = $request->all();
        $rules = [
            'state_division' => 'required',
            'township_id' => 'required',
            'basic_need' => 'required',
            'affect_people' => 'required',
            'phone' => 'required',
            'report_by' => 'required',
            'description' => 'required',
        ];

        $validator = Validator::make($request, $rules);

        if ($validator->fails())
        {
            return back()->withErrors($validator)->with(['action_message' => 'openReportForm']);
        }
        
        $request['owner_id'] = auth()->id() ?? null;

        ReportForm::create($request);

        return back()->with(['message' => 'လိုအပ်သည့်အကူအညီများအတည်ပြုရန်တင်ပြပြီးဖြစ်ပါသည်။']);

    }
}
