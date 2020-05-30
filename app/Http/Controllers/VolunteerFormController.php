<?php

namespace App\Http\Controllers;

use App\VolunteerForm;
use Illuminate\Http\Request;
use Validator;
use App\Service\VolunteerFormService;

class VolunteerFormController extends Controller
{

    public function index()
    {
        $volunteers = (new VolunteerFormService)->get();

        return view('volunteers.volunteer')->with('volunteers', $volunteers);
    }

    public function store(Request $request)
    {
        $request = $request->all();

        $rules = [
            'volunteer_name' => 'required',
            'volunteer_age' => 'required',
            'volunteer_gender' => 'required',
            'volunteer_phone' => 'required',
            'volunteer_address' => 'required',
            'prefer_location' => 'required',
        ];

        $validator = Validator::make($request, $rules);

        if ($validator->fails())
        {
            return back()->withErrors($validator)->withInput()->with(['action_message' => 'openVolunteerForm']);
        }
        
        VolunteerForm::create($request);

        return back()->with(['message' => 'ပါ၀င်ပေးသည့်အတွက် ကျေးဇူးတင်ပါတယ်']);
    }
}
