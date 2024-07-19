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

    public function update(Request $request, $id)
    {
        $request->validate([
            'appareil' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'statut' => 'required|string|in:À faire,En cours,Terminé,Repris par le client'
        ]);

        $reparation = Reparations::find($id);

        if (!$reparation) {
            return redirect()->route('reparations.index')->with('error', 'Réparation non trouvée.');
        }

        $reparation->appareil = $request->appareil;
        $reparation->description = $request->description;
        $reparation->statut = $request->statut;
        $reparation->save();

        return redirect()->route('index')->with('success', 'Réparation mise à jour avec succès.');
    }


}

