<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkings', function (Blueprint $table) {
            $table->id();
            $table->string('ville');
            $table->string('emplacement');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('numéro_téléphone')->nullable();
            $table->integer('nb_p_c_voiture')->nullable();
            $table->integer('nb_p_c_moto')->nullable();
            $table->integer('nb_p_nc_voiture')->nullable();
            $table->integer('nb_p_nc_moto')->nullable();
            $table->integer('prix')->nullable();
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
        Schema::dropIfExists('parkings');
    }
}
