<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    //
    use HasFactory;

    protected $table = 'eleves';

    protected $fillable = ['nom_eleve', 'prenoms', 'date_de_naissance', 'sexe', 'statut', 'numeroMatricule', 'classe_precedente_id', 'sous_classe_id'];
    
    public $timestamps = false;

    public function classePrecedente()
    {
        return $this->belongsTo(SousClasse::class, 'classe_precedente_id');
    }

    public function sousClasse()
    {
        return $this->belongsTo(SousClasse::class);
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }
}
