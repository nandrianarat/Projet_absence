<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eleve;
use App\Models\SousClasse;

class EleveController extends Controller
{
    //

    public function gestionEleve()
    {
        $eleves = Eleve::paginate(4);
        $sousClasse = SousClasse::all();
        return view('eleve.liste', compact('eleves', 'sousClasse'));
    }

    public function listeELeve()
    {
        $eleves = Eleve::paginate(4);
        $sousClasse = SousClasse::all();
        return view('eleve.listeEleve', compact('eleves', 'sousClasse'));
    }

    public function goEleve()
    {
        $sousClasses = SousClasse::all();
        return view('eleve.ajouter_eleve', compact('sousClasses'));
    }

    public function ajoutEleve(Request $request)
    {
        // Validation des champs
        $request->validate([
            'NomEleve' => 'required|string|max:50',
            'Prenoms' => 'required|string|max:50',
            'Date_de_naissance' => 'required|date',
            'Sexe' => 'required|in:M,F',
            'NumeroMatricule' => 'required|string|max:20|unique:eleves,NumeroMatricule',
            'classe_precedente_id' => 'nullable|exists:sous_classes,id',
            'sous_classe_id' => 'required|exists:sous_classes,id',
            'Statut' => 'required|in:Passant,Redoublant',
        ]);

        
        // Création de l'élève
        $eleve = new Eleve();
        $eleve->nom_eleve = $request->NomEleve;
        $eleve->prenoms = $request->Prenoms;
        $eleve->date_de_naissance = $request->Date_de_naissance;
        $eleve->sexe = $request->Sexe;
        $eleve->numeroMatricule = $request->NumeroMatricule;
        $eleve->classe_precedente_id = $request->classe_precedente_id;
        $eleve->sous_classe_id = $request->sous_classe_id;
        $eleve->statut = $request->Statut;
        $eleve->save();

        return redirect('/eleve')->with('success', 'Élève ajouté avec succès.');
    }
    public function editEleve($id)
    {
        $sousClasses = SousClasse::all();
        $eleve = Eleve::find($id);
        return view('eleve.editer_eleve', compact('sousClasses','eleve'));
    }

    public function traitementEleve(Request $request)
    {
        // Validation des champs
        $request->validate([
            'NomEleve' => 'required|string|max:50',
            'Prenoms' => 'required|string|max:50',
            'Date_de_naissance' => 'required|date',
            'Sexe' => 'required|in:M,F',
            'NumeroMatricule' => 'required|string|max:20',
            'sous_classe_id' => 'required|exists:sous_classes,id',
            'classe_precedente_id' => 'nullable|exists:sous_classes,id',
            'Statut' => 'required|in:Passant,Redoublant',
        ]);

        try {
        $eleve = Eleve::find($request->id);        
        $eleve->nom_eleve = $request->NomEleve;
        $eleve->prenoms = $request->Prenoms;
        $eleve->date_de_naissance = $request->Date_de_naissance;
        $eleve->sexe = $request->Sexe;
        $eleve->numeroMatricule = $request->NumeroMatricule;
        $eleve->classe_precedente_id = $request->classe_precedente_id;
        $eleve->sous_classe_id = $request->sous_classe_id;
        $eleve->statut = $request->Statut;
        $eleve->update();
        
        return redirect('/eleve')->with('success', 'Élève modifié avec succès.');
    } catch (\Exception $e) {
        // Gérer l'exception
        return redirect('/eleve')->withErrors(['error' => 'Une erreur est survenue : ' . $e->getMessage()]);
    }
    }

    public function supprimerEleve($id){
        $eleve = Eleve::find($id);
        $sousClasse = SousClasse::all();
        $eleve->delete();

        return redirect('/eleve')->with('success', 'Élève supprimé avec succès.');
    }

    // public function getEleves($sousClasseId)
    // {
    //     $eleves = Eleve::where('sous_classe_id', $sousClasseId)->get();
    //     return response()->json($eleves);
    // }

}
