<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\SousClasseController;
use App\Http\Controllers\AnneeController;
use App\Http\Controllers\AbsenceController;

Route::get('/home',[AnneeController::class,'home']);


Route::get('/annee_scolaire',[AnneeController::class,'anneeScolaire'])->name('annee_scolaire');
Route::get('/go_annee',[AnneeController::class,'goAnnee']);
Route::post('/ajouter_annee',[AnneeController::class,'ajoutAnnee'])->name('ajouter_annee');
Route::get('/editer_annee/{id}', [AnneeController::class, 'editAnnee'])->name('editer_annee');
Route::post('/traitement_annee',[AnneeController::class,'traitementAnnee'])->name('traitement_annee');
Route::get('/supprimer_annee/{id}', [AnneeController::class, 'supprimerAnnee'])->name('supprimer_annee');



Route::get('/gestion_eleve',[EleveController::class,'gestionEleve'])->name('gestion_eleve');
Route::get('/eleve',[EleveController::class,'listeEleve'])->name('eleve');
Route::get('/go_eleve',[EleveController::class,'goEleve']);
Route::post('/ajouter_eleve',[EleveController::class,'ajoutEleve'])->name('ajouter_eleve');
Route::get('/editer_eleve/{id}', [EleveController::class, 'editEleve'])->name('editer_eleve');
Route::put('/traitement_eleve',[EleveController::class,'traitementEleve'])->name('traitement_eleve');
Route::get('/supprimer_eleve/{id}', [EleveController::class, 'supprimerEleve'])->name('supprimer_eleve');


Route::get('/gestion_classe',[ClasseController::class,'gestionClasse'])->name('gestion_classe');
Route::get('/details_classe/{id}', [ClasseController::class, 'detailsClasse'])->name('classe.details');
Route::get('/classe',[ClasseController::class,'listeClasse'])->name('classe');
Route::get('/go_classe',[ClasseController::class,'goClasse']);
Route::post('/ajouter_classe',[ClasseController::class,'ajoutClasse'])->name('ajouter_classe');
Route::get('/editer_classe/{id}', [ClasseController::class, 'editClasse'])->name('editer_classe');
Route::post('/traitement_classe',[ClasseController::class,'traitementClasse'])->name('traitement_classe');
Route::get('/supprimer_classe/{id}', [ClasseController::class, 'supprimerClasse'])->name('supprimer_classe');



Route::get('/sous_classe',[SousClasseController::class,'listeSousClasse'])->name('sous_classe');
Route::get('/go_sous_classe',[SousClasseController::class,'goSousClasse']);
Route::post('/ajouter_sousClasse',[SousClasseController::class,'ajoutSousClasse'])->name('ajouter_sousClasse');
Route::get('/editer_sous_classe/{id}', [SousClasseController::class, 'editSousClasse'])->name('editer_sous_classe');
Route::post('/traitement_sous_classe',[SousClasseController::class,'traitementSousClasse'])->name('traitement_sous_classe');
Route::get('/supprimer_sous_classe/{id}', [SousClasseController::class, 'supprimerSousClasse'])->name('supprimer_sous_classe');


// Route::get('/editer_annee/{id}', [AbsenceController::class, 'editAnnee'])->name('editer_annee');
// Route::post('/traitement_annee',[AbsenceController::class,'traitementAnnee'])->name('traitement_annee');
// Route::get('/supprimer_annee/{id}', [AbsenceController::class, 'supprimerAnnee'])->name('supprimer_annee');


//absence
Route::get('/index',[ClasseController::class,'indexClasse'])->name('index');
Route::get('/sousclasses', [SousClasseController::class, 'indexSousClasse'])->name('sousclasses.index');
Route::get('/go_absence',[AbsenceController::class,'goAbsence'])->name('absence');
Route::post('/ajouter_absence',[AbsenceController::class,'ajoutAbsence'])->name('ajouter.absence');
Route::get('/absences_liste', [AbsenceController::class, 'absencesParSousClasse'])
    ->name('absences.sous_classe');

Route::get('/rapport',[AbsenceController::class,'rapport'])->name('rapport');
Route::post('/rapport_absences', [AbsenceController::class, 'rapportMensuel'])->name('rapport.absences');



