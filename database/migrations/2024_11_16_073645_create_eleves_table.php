<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            $table->string('nom_eleve', 50);
            $table->string('prenoms', 50);
            $table->date('date_de_naissance');
            $table->enum('sexe', ['M', 'F']);
            $table->string('numeroMatricule', 20)->unique();
            $table->foreignId('classe_precedente_id')->nullable()->constrained('sous_classes')->onDelete('set null'); // Classe précédente
            $table->foreignId('sous_classe_id')->constrained('sous_classes')->onDelete('cascade'); // classe Actuelle
            $table->enum('statut', ['Passant', 'Redoublant']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eleves');
    }
};
