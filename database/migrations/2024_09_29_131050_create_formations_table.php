<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsTable extends Migration
{
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id(); // This will create an auto-incrementing ID
            $table->string('name');
            $table->text('description');
            $table->string('image')->nullable(); // Optional
            $table->date('starting_date'); // Use date for just the date
            $table->timestamps(); // Created at and Updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('formations');
    }
}
;
