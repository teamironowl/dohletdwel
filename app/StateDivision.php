<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StateDivision extends Model
{
    public function cases()
    {
        return $this->hasMany(ReportForm::class, 'state_division');
    }
}
