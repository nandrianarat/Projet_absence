<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\SousClasse;
use App\Models\AnneeScolaire;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    // Affiche la liste de toutes les classes
    public function gestionClasse()
    {
        $anneeScolaire = AnneeScolaire::all();
        $classes = Classe::all();
        return view('classe.liste', compact('classes','anneeScolaire'));
    }
    public function listeClasse()
    {
        $anneeScolaire = AnneeScolaire::all();
        $classes = Classe::all();
        return view('classe.listeClasse', compact('classes','anneeScolaire'));
    }

    // Affiche le formulaire de création d'une classe
    public function goClasse()
    {
        $classes = Classe::all();
        $anneeScolaires = AnneeScolaire::all();
        return view('classe.ajouter_classe', compact('anneeScolaires','classes'));
    }

    // Enregistre une nouvelle classe
    public function ajoutClasse(Request $request)
    {
        $nombreClasses = Classe::count();
        if ($nombreClasses >= 3) {
            return redirect()->back()->with('error', 'Le nombre maximum de classes a été atteint.');
        }

        $request->validate([
            'nom' => 'required|string|max:20',
            'annee_scolaire_id' => 'required|exists:annee_scolaires,id',
        ]);
        $classe = new Classe();
        $classe->nomClasse = $request->nom;
        $classe->annee_scolaire_id = $request->annee_scolaire_id;
        $classe->save();
        return redirect('/classe')->with('success', 'Classe créée avec succès.');
    }

    // Affiche le formulaire d'édition d'une classe
    public function editClasse($id)
    {
        $anneeScolaires = AnneeScolaire::all();
        $classes = Classe::find($id);
        return view('classe.editer_classe', compact('classes', 'anneeScolaires'));
    }

    // Met à jour une classe existante
    public function traitementClasse(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:20',
            'annee_scolaire_id' => 'required|exists:annee_scolaires,id',

        ]);

        $classe = Classe::find($request->id);
        $classe->nomClasse = $request->nom;
        $classe->annee_scolaire_id = $request->annee_scolaire_id;
        $classe->update();
        return redirect('/classe')->with('success', 'Classe modifiée avec succès.');
    }

    // Supprime une classe
    public function supprimerClasse($id)
    {
        $classe = Classe::find($id);
        if ($classe) {
            // Supprime toutes les sous-classes associées
            $classe->sousClasses()->delete();
            // Supprime la classe elle-même
            $classe->delete();
    
            return redirect('/classe')->with('success', 'Classe et ses sous-classes supprimées avec succès.');
        }

        return redirect('/classe')->with('error', 'Classe introuvable.');
    }

    public function detailsClasse($id){
        $classe = Classe::find($id);
        $sousClasse = SousClasse::all();
        return view('classe.detail_classe', compact('classe', 'sousClasse'));
    }


    //absence

    public function indexClasse()
    {
        $classes = Classe::all(); // Récupérer toutes les classes
        return view('absence.listeAClasse', compact('classes'));
    }
}

