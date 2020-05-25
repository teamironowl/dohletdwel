<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportForm extends Model
{
    static $STATUS_PENDING  = 1;
    static $STATUS_APPROVE  = 2;
    static $STATUS_CANCEL   = 3;
    
    protected $guarded = [];
}
