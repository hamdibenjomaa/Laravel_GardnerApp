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
        Schema::create('jardiniers', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->string('localisation')->nullable();
            $table->string('horaire')->nullable();
            $table->string('cout')->nullable();
            $table->enum ('specialite', ['Paysagiste','Jardinier d’entretien','fleuriste',' Jardinier horticole','Arboriculteur']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jardiniers');
    }
};
