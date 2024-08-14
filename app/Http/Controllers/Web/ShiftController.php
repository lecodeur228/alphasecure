<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
      // Liste des shifts
      public function index()
      {
          $shifts = Shift::with('agent')->get();
          return view('shifts.index', compact('shifts'));
      }
  
      // Afficher le formulaire de création
      public function create()
      {
          $agents = Agent::all();
          return view('shifts.create', compact('agents'));
      }
  
      // Enregistrer un nouveau shift
      public function store(Request $request)
      {
          $request->validate([
              'agent_id' => 'required|exists:agents,id',
              'date' => 'required|date',
              'type_shift' => 'required|string|in:matin,soir',
          ]);
  
          // Vérifier si l'agent est déjà programmé pour cette date
          $existingShift = Shift::where('agent_id', $request->agent_id)
                                ->where('date', $request->date)
                                ->exists();
  
          if ($existingShift) {
              return back()->withErrors(['agent_id' => 'Cet agent est déjà programmé pour cette date.'])
                           ->withInput();
          }
  
          // Créer le shift
          $shift = new Shift();
          $shift->agent_id = $request->agent_id;
          $shift->date = $request->date;
          $shift->type_shift = $request->type_shift;
          $shift->save();
  
          return redirect()->route('shifts.index')->with('success', 'Shift ajouté avec succès.');
      }
  
      // Afficher les détails d'un shift
      public function show(Shift $shift)
      {
        return view('shifts.show', compact('shift'));
      }
  
      // Afficher le formulaire de modification
      public function edit(Shift $shift)
      {
          $agents = Agent::all();
          return view('shifts.edit', compact('shift', 'agents'));
      }
  
      // Mettre à jour les informations d'un shift
      public function update(Request $request, Shift $shift)
      {
          $request->validate([
              'agent_id' => 'required|exists:agents,id',
              'date' => 'required|date',
              'type_shift' => 'required|string|in:matin,soir',
          ]);
  
          // Vérifier si l'agent est déjà programmé pour cette date (sauf pour ce shift)
          $existingShift = Shift::where('agent_id', $request->agent_id)
                                ->where('date', $request->date)
                                ->where('id', '!=', $shift->id)
                                ->exists();
  
          if ($existingShift) {
              return back()->withErrors(['agent_id' => 'Cet agent est déjà programmé pour cette date.'])
                           ->withInput();
          }
  
          // Mettre à jour le shift
          $shift->agent_id = $request->agent_id;
          $shift->date = $request->date;
          $shift->type_shift = $request->type_shift;
          $shift->save();
  
          return redirect()->route('shifts.index')->with('success', 'Shift mis à jour avec succès.');
      }
  
      // Supprimer un shift
      public function destroy(Shift $shift)
      {
          $shift->delete();
          return redirect()->route('shifts.index')->with('success', 'Shift supprimé avec succès.');
      }
}
