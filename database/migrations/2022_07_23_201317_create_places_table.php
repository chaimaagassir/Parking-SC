<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->boolean('etat')->default(0); //0--> vide  1--> réservé 
            $table->boolean('couverte')->default(1); //0--> non couverte  1--> couverte 
            $table->boolean('typev')->default(1); //1--> voiture  0--> moto 
            $table->integer('numero') ;
            $table->foreignId('id_parking')
                  ->constrained('parkings')
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
        Schema::dropIfExists('places');
    }
}
