<?php

namespace App\Service;

use App\VolunteerForm;

class VolunteerFormService
{
    public function get()
    {
        return VolunteerForm::orderBy('created_at', 'desc')->paginate(5);
    }
}