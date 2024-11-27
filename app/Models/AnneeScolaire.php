<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeScolaire extends Model
{
    //
    use HasFactory;

    protected $table = 'annee_scolaires';

    protected $fillable = ['annee', 'date_debut', 'date_fin']; 
    
    public $timestamps = false;

    
    public function classes()
    {
        return $this->hasMany(Classe::class);
    }
}
