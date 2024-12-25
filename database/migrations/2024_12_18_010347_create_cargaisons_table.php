<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargaisonsTable extends Migration
{
    public function up(): void
    {
        Schema::create('cargaisons', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('type');
            $table->integer('choice')->nullable();
            $table->float('productweight')->default(0);
            $table->integer('productnumber')->default(0);
            $table->float('hideweight')->default(0);
            $table->integer('hideproduct')->default(0);
            $table->enum('status', ['fermé', 'ouvert'])->default('ouvert');
            $table->enum('etat_globale', ['en cours', 'arriver', 'perdu'])->default('en cours');
            $table->integer('pays_arriver');
            $table->integer('pays_depart');
            $table->date('date_depart');
            $table->date('date_arrivee')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cargaisons');
    }
}
