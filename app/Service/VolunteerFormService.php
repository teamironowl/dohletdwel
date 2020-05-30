<?php

namespace App\Service;

use App\VolunteerForm;

class VolunteerFormService
{
    public function get()
    {
        return VolunteerForm::paginate(5);
    }
}