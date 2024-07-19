<?php

namespace App\Http\Controllers;
use App\Models\Clients;
use Illuminate\Http\Request;

class ClientControlleur extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
        ]);

        Clients::create($request->all());

        return redirect()->route('index')->with('success', 'Client ajouté avec succès!');
    }
}
