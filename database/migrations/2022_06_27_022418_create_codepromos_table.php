<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodepromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codepromos', function (Blueprint $table) {
            $table->id();
            $table->string('Nom')->nullable();
            $table->string('Code')->unique();
            $table->string('Occasion')->nullable();
            $table->integer('Pourcentage');
            $table->integer('nb_reserv')->nullable();
            $table->dateTime('date_expiration')->nullable();
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
        Schema::dropIfExists('codepromos');
    }
}
