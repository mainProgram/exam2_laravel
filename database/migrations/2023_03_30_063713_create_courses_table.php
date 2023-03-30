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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->time("heure_depart");
            $table->time("heure_arrivee")->nullable();
            $table->bigInteger('itineraire')->unsigned()->index();
            $table->foreign('itineraire')->references('id')->on('itineraires')->onDelete('cascade');
            $table->bigInteger('chauffeur')->unsigned()->index()->nullable();
            $table->foreign('chauffeur')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('passager')->unsigned()->index()->nullable();
            $table->foreign('passager')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
