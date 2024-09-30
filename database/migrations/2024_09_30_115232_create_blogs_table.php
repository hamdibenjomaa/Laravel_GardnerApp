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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Blog title
            $table->text('content'); // Blog content
            $table->enum('type', ['thought', 'question', 'recommendation', 'advice', 'joke']); // Enum for blog type
            $table->date('blogDate'); // Blog date
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
