<?php

namespace App\Http\Controllers;

use App\Models\SousClasse;
use App\Models\Classe;
use Illuminate\Http\Request;

class SousClasseController extends Controller
{
    //

    // Affiche la liste des sous-classes
    public function listeSousClasse()
    {
        $sousClasses = SousClasse::paginate(4);
        $classes = Classe::all();
        return view('sousclasse.listeSousClasse', compact('sousClasses', 'classes'));
    }

    // Affiche le formulaire de création
    public function goSousClasse()
    {
        $classes = Classe::all(); // Récupère toutes les classes pour le dropdown
        return view('sousclasse.ajouter_sousClasse', compact('classes'));
    }

    // Enregistre une nouvelle sous-classe
    public function ajoutSousClasse(Request $request)
    {
        $request->validate([
            'NomSousClasse' => 'required|string|max:20',
            'classe_id' => 'required|exists:classes,id'
        ]);

        $sousClasse = new SousClasse();
        $sousClasse->nomSousClasse = $request->NomSousClasse;
        $sousClasse->classe_id = $request->classe_id;
        $sousClasse->save();

        return redirect('/sous_classe')->with('success', 'Sous-Classe créée avec succès.');

    }

    public function editSousClasse($id)
    {
        $classes = Classe::all();
        $sousClasse = SousClasse::find($id);
        return view('sousclasse.editer_sous_classe', compact('sousClasse','classes'));
    }

    public function traitementSousClasse(Request $request)
    {
        $request->validate([
            'NomSousClasse' => 'required|string|max:20',
            'classe_id' => 'required|exists:classes,id'
        ]);

        $sousClasse = SousClasse::find($request->id);
        $sousClasse->nomSousClasse = $request->NomSousClasse;
        $sousClasse->classe_id = $request->classe_id;
        $sousClasse->update();
        return redirect('/sous_classe')->with('success', 'Sous-Classe modifiée avec succès.');
    }

    public function supprimerSousClasse($id){
        $sousClasse = SousClasse::find($id);
        $classe = Classe::all();
        $sousClasse->delete();

        return redirect('/sous_classe')->with('success', 'Sous-Classe supprimée avec succès.');
    }

    //absence
    public function indexSousClasse(Request $request)
    {
        $classeId = $request->query('classe_id');
        $sousClasses = SousClasse::where('classe_id', $classeId)->get(); // Récupérer les sous-classes de la classe

        return view('absence.listeASousClasse', compact('sousClasses', 'classeId'));
    }
}
