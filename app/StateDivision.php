<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StateDivision extends Model
{
    public function cases()
    {
        return $this->hasMany(ReportForm::class, 'state_division');
    }

    public function medias()
    {
        return $this->hasManyThrough(File::class, ReportForm::class, 'state_division', 'report_form_id', 'state_division');
    }
}
