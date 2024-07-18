<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reparations; 

class ReparationControlleur extends Controller
{
    public function index()
    {
        $reparations = Reparations::with('clients')->get();

        return view('index', [
            'reparations' => $reparations
        ]);
    }
}

