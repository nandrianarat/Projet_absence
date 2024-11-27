<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $table = 'absences';
    protected $casts = [
    'date_absence' => 'datetime',
    ];


    // Les attributs qui peuvent être assignés en masse
    protected $fillable = [
        'eleve_id',
        'sous_classe_id',
        'date_absence',
        
    ];
    public $timestamps = false;

    // Relation avec le modèle Eleve
    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }

    public function sousClasse()
    {
        return $this->belongsTo(SousClasse::class);
    }
}

