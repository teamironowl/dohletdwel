<?php

namespace App\Http\Controllers;

use App\Service\StateDivisionService;
use App\Service\TownshipService;

class StateDivisionController extends Controller
{
    public function index($id)
    {
        $cases  = (new StateDivisionService)->getCasesByDivisionId($id);

        return view('case_by_division')->with(['cases' => $cases]);
    }

    public function getAjax($id)
    {
        return (new TownshipService)->get($id);
    }
}
