<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->dateTime("date_debut");
            $table->dateTime('date_fin');
            $table->integer('prix');
            $table->integer('prix_a_payer');
            $table->string('statut')->default('confirmée');
            $table->foreignId('id_client')
            ->constrained('users')
            ->onDelete('cascade')
            ->onUpdate('cascade'); 
            $table->foreignId('id_parking')
            ->constrained('parkings')
            ->onDelete('cascade')
            ->onUpdate('cascade'); 
            $table->foreignId('id_place')
            ->constrained('places')
            ->onDelete('cascade')
            ->onUpdate('cascade'); 
            $table->foreignId('id_vehicule')
            ->constrained('vehicules')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignId('id_codepromos')->nullable()
            ->constrained('codepromos')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
