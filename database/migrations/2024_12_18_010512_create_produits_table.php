<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    public function up(): void
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cargaison_id'); // Clé étrangère vers cargaisons
            $table->string('first_name');
            $table->string('second_name')->nullable();
            $table->text('adress');
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('nameproduct');
            $table->float('weight')->default(0);
            $table->string('producttype');
            $table->string('typepro')->nullable();
            $table->string('sendname')->nullable();
            $table->string('recipientname');
            $table->string('departure');
            $table->string('arrival');
            $table->timestamps();

            // Relation avec cargaisons
            $table->foreign('cargaison_id')->references('id')->on('cargaisons')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
}
