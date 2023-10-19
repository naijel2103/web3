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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('titre',100);
            $table->text('resume');
            $table->text('pallete');
            $table->float('duree');
            $table->unsignedBigInteger('realisateur');
            $table->foreign("realisateur")->references('id')->on('personnes');
            $table->unsignedBigInteger('producteur');
            $table->foreign("producteur")->references('id')->on('personnes');
            $table->integer('annee');
            $table->float('rating');
            $table->text('video');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
