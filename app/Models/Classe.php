<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = ['nomClasse', 'annee_scolaire_id']; // Liste des attributs pouvant être remplis en masse
    
    public $timestamps = false;

    public function sousClasses()
    {
        return $this->hasMany(SousClasse::class);
    }
    
    public function anneeScolaire()
    {
        return $this->belongsTo(AnneeScolaire::class);
    }
}
