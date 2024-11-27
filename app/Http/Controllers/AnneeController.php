<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnneeScolaire;
use App\Models\Classe;

class AnneeController extends Controller
{
    //

    public function home()
    {
        return view('layouts.pages');
    }

    public function anneeScolaire()
    {
        $anneeScolaires = AnneeScolaire::all();
        return view('anneescolaire.listeAnnee', compact('anneeScolaires'));
    }

    public function goAnnee()
    {
        return view('anneescolaire.ajouter_annee');
    }

    public function ajoutAnnee(Request $request)
    {
        // Validation des données
        $request->validate([
        'Annee' => 'required|string|max:10', // Ajustez la longueur si nécessaire
        'Date_debut' => 'required|date',
        // 'Date_fin' => 'required|date|after_or_equal:date_debut' // Vérifie que la date de fin est après la date de début
    ]);
        // Création d'une nouvelle instance de la table annees_scolaires
        $anneeScolaire = new AnneeScolaire();
        $anneeScolaire->annee = $request->Annee;
        $anneeScolaire->date_debut = $request->Date_debut;
        $anneeScolaire->date_fin = $request->Date_fin;
        $anneeScolaire->save(); // Enregistrement dans la base de données
        return redirect('/annee_scolaire')->with('success', 'Année Scolaire créée avec succès.');
    }

    public function editAnnee($id)
    {
        $anneeScolaires = AnneeScolaire::find($id);
        return view('anneescolaire.editer_annee', compact('anneeScolaires'));
    }

    public function traitementAnnee(Request $request)
    {
        // Validation des données
        $request->validate([
        'Annee' => 'required|string|max:10', // Ajustez la longueur si nécessaire
        'Date_debut' => 'required|date',
        // 'Date_fin' => 'required|date|after_or_equal:date_debut' // Vérifie que la date de fin est après la date de début
    ]);
        // Création d'une nouvelle instance de la table annees_scolaires
        $anneeScolaire = AnneeScolaire::find($request->id);
        $anneeScolaire->annee = $request->Annee;
        $anneeScolaire->date_debut = $request->Date_debut;
        $anneeScolaire->date_fin = $request->Date_fin;
        $anneeScolaire->update(); // Enregistrement dans la base de données
        return redirect('/annee_scolaire')->with('success', 'Année Scolaire modifiée avec succès.');
    }

    public function supprimerAnnee($id){
        $anneeScolaires = AnneeScolaire::find($id);
        $classe = Classe::all();
        $anneeScolaires->delete();

        return redirect('/annee_scolaire')->with('success', 'Année Scolaire supprimée avec succès.');
    }
    
}
