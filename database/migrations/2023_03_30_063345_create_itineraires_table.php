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
        Schema::create('itineraires', function (Blueprint $table) {
            $table->id();
            $table->integer("tarif");
            $table->bigInteger('depart')->unsigned()->index()->nullable();
            $table->foreign('depart')->references('id')->on('endroits')->onDelete('cascade');
            $table->bigInteger('arrivee')->unsigned()->index()->nullable();
            $table->foreign('arrivee')->references('id')->on('endroits')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itineraires');
    }
};
