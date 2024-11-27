<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousClasse extends Model
{

    use HasFactory;

    protected $table = 'sous_classes';

    protected $fillable = ['nomSousClasse', 'classe_id'];
    
    public $timestamps = false;
    
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function eleves()
    {
        return $this->hasMany(Eleve::class, 'classe_precedente_id');
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

}
