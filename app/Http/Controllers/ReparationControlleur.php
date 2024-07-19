<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\Reparations;

class ReparationControlleur extends Controller
{
    public function index()
    {
        $reparations = Reparations::with('clients')->get();
        $clients = Clients::all(); 

        return view('index',  compact('reparations', 'clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'appareil' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'client_id' => 'required|exists:clients,id',
            'statut' => 'A faire'

        ]);

        $data = $request->only('appareil', 'description', 'client_id');
        $data['statut'] = 'À faire'; 
        $data['date_depot'] = now();

        Reparations::create($data);

        return redirect()->route('index')->with('success', 'Réparation ajoutée avec succès!');
    }
}

