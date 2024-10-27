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
        Schema::create('participations', function (Blueprint $table) {
            $table->id(); // Identifiant unique pour la participation
            $table->foreignId('event_id')->constrained()->onDelete('cascade'); // Clé étrangère vers Événement
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Clé étrangère vers Utilisateur
            $table->string('statut'); // Statut de la participation
            $table->timestamp('registered_at')->useCurrent(); // Date et heure d'inscription
            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participations');
    }
};
