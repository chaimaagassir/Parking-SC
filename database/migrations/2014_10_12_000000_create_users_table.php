<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('prenom');
            $table->string('avatar')->default('default.jpg')->nullable();
            $table->string('profile_photo_path')->nullable() ;  
            $table->string('tel')->nullable();
            $table->string('ville')->nullable();
            $table->string('email')->unique();
            $table->string('cin')->unique();
            $table->string('usertype')->default(0)->nullable();
            $table->integer('nb_v')->default(0)->nullable();
            $table->integer('solde')->default(0)->nullable();
            $table->boolean('etatcpt')->default(1)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
       
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
        Schema::dropIfExists('users');
    }
};
