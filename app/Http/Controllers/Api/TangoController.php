<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tango;
use Illuminate\Http\Request;

class TangoController extends Controller
{
    public function index()
    {
        $tangos = Tango::all();
        return response()->json([
            "success" => true,
            "results" => $tangos,
        ]);
    }
}
