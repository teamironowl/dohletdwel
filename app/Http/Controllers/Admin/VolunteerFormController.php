<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\VolunteerFormService;

class VolunteerFormController extends Controller
{
    public function index()
    {
        $volunteers = (new VolunteerFormService)->get();

        return view('admin.volunteer_form')->with('volunteers', $volunteers);
    }
}
