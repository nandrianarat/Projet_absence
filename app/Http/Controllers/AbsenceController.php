<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Absence;
use App\Models\SousClasse;

class AbsenceController extends Controller
{
    //
    public function goAbsence(Request $request)
    {
        $sousClasseId = $request->query('sous_classe_id');
        $eleves = Eleve::where('sous_classe_id', $sousClasseId)->get(); // Récupérer les élèves de la sous-classe
        $sousClasse = SousClasse::findOrFail($sousClasseId); // Récupérer la sous-classe par ID
    
        return view('absence.ajouter_absence', compact('eleves','sousClasse'));
    }

    public function ajoutAbsence(Request $request)
    {

            // Validation des données
            $request->validate([
                'eleve_id' => 'required|exists:eleves,id',
                'Date_absence' => 'required|date',
                'sous_classe_id' => 'required|exists:sous_classes,id',
            ]);

            $absence = new Absence();
            $absence->eleve_id = $request->eleve_id;
            $absence->sous_classe_id = $request->sous_classe_id;
            $absence->date_absence = $request->Date_absence;
            $absence->save();
    
        return redirect('/absences_liste')->with('success', 'Absence enregistrée avec succès.');
    
    }

    public function absencesParSousClasse()
    {
        $sousClasses = SousClasse::with(['eleves.absences' => function($query) {
            $query->whereNotNull('date_absence'); // Filtrer les absences
        }])->get();

        return view('absence.listeAbsence', compact('sousClasses'));
    }


    //Rapport

    public function rapport(){

        return view('rapport.formulaire');

    }
    public function rapportMensuel(Request $request)
{
    $request->validate([
        'mois' => 'required|date_format:Y-m',
    ]);

    $mois = $request->mois;

    // Récupérer les absences pour le mois spécifié
    $absences = Absence::with('eleve')
        ->whereMonth('date_absence', date('m', strtotime($mois)))
        ->whereYear('date_absence', date('Y', strtotime($mois)))
        ->get();

    // Récupérer tous les élèves de la sous-classe pour le calcul du taux d'absentéisme
    $sousClasseId = $absences->first()->sous_classe_id ?? null;
    $eleves = Eleve::where('sous_classe_id', $sousClasseId)->get();

    // Calculer le taux d'absentéisme
    $totalEleves = $eleves->count();
    $totalAbsences = $absences->count();
    $tauxAbsentisme = $totalEleves > 0 ? ($totalAbsences / $totalEleves) * 100 : 0;

    return view('rapport.absence', compact('absences', 'mois', 'tauxAbsentisme'));
}

}
