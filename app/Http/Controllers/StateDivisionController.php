<?php

namespace App\Http\Controllers;

use App\StateDivision;
use Illuminate\Http\Request;

class StateDivisionController extends Controller
{
    public function getAjax($id)
    {
        return response()->json([
            'townships' => \App\Township::select('id', 'name')->where('state_division_id', $id)->get()
        ]);
    }
}
