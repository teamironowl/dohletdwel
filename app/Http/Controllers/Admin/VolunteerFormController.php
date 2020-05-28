<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VolunteerFormController extends Controller
{
    public function index()
    {
        return view('admin.volunteer_form');
    }
}
