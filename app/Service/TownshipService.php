<?php

namespace App\Service;

use App\Township;

class TownshipService
{
    public function get($id)
    {
        return Township::select('id', 'name')->where('state_division_id', $id)->get();
    }
}