<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReportForm;
use Validator;
use App\File;

class ReportFormController extends Controller
{
    public function store(Request $request)
    {
        $request = $request->except('files');

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
            return back()->withErrors($validator)->withInput()->with(['action_message' => 'openReportForm']);
        }
        
        $request['owner_id'] = auth()->id() ?? null;

        $reportForm = ReportForm::create($request);

        $files = request()->file('files');

        if(request()->hasFile('files'))
        {
            foreach ($files as $file) {
                $extension      = $file->getClientOriginalExtension();
                $name           = now()->format('Ymd').'_'.uniqid().'.'.$extension;
                $imagepath      = '/storage/'.$name;
                $file->storeAs('public', $name);

                File::create([
                    'report_form_id' => $reportForm->id,
                    'file_path' => $imagepath,
                ]);
            }
        }
        return back()->with(['message' => 'လိုအပ်သည့်အကူအညီများအတည်ပြုရန်တင်ပြပြီးဖြစ်ပါသည်။']);
    }
}
