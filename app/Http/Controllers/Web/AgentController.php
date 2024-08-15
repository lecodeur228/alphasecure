<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgentController extends Controller
{
    // Liste des agents
    public function index()
    {
        $agents = Agent::all();
        return view('agents.index', compact('agents'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('agents.create');
    }

    // Enregistrer un nouvel agent
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:agents',
            'telephone' => 'required|string|max:15',
            'photo' => 'nullable',
        ]);

        $agent = new Agent();
        $agent->nom = $request->nom;
        $agent->prenom = $request->prenom;
        $agent->email = $request->email;
        $agent->telephone = $request->telephone;
        $agent->disponibilite = $request->has('disponibilite') ? true : false;

        // Upload de la photo si présente
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $agent->photo = $path;
        }

        $agent->save();

        return redirect()->route('agents.index')->with('success', 'Agent ajouté avec succès.');
    }

    // Afficher les détails d'un agent
    public function show(Agent $agent)
    {
        return view('agents.show', compact('agent'));
    }

    // Afficher le formulaire de modification
    public function edit(Agent $agent)
    {
        return view('agents.edit', compact('agent'));
    }

    // Mettre à jour les informations d'un agent
    public function update(Request $request, Agent $agent)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:agents,email,' . $agent->id,
            'telephone' => 'required|string|max:15',
            'photo' => 'nullable',
        ]);

        $agent->nom = $request->nom;
        $agent->prenom = $request->prenom;
        $agent->email = $request->email;
        $agent->telephone = $request->telephone;
        $agent->disponibilite = $request->has('disponibilite') ? true : false;

        // Upload de la photo si présente
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($agent->photo) {
                Storage::disk('public')->delete($agent->photo);
            }

            $path = $request->file('photo')->store('photos', 'public');
            $agent->photo = $path;
        }

        $agent->save();

        return redirect()->route('agents.index')->with('success', 'Agent mis à jour avec succès.');
    }

    // Supprimer un agent
    public function destroy(Agent $agent)
    {
        // Supprimer la photo si elle existe
        if ($agent->photo) {
            Storage::disk('public')->delete($agent->photo);
        }

        $agent->delete();

        return redirect()->route('agents.index')->with('success', 'Agent supprimé avec succès.');
    }
}
