<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RampCTFController extends Controller
{
    public function showCTF()
    {
        return response()->json('handful');
    }
}
