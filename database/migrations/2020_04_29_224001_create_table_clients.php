<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('civilité');
            $table->string('nom');
            $table->string('prénom');
            $table->string('email');
            $table->string('télephone');
            $table->string('télephone1');
            $table->string('status');
            $table->string('régime');
            $table->string('iban');
            $table->string('ss');
            $table->float('cotisation');
            $table->string('adresse');
            $table->string('ville');
            $table->string('comapagne');
            $table->string('codepostal');


            $table->date('date_naissance');
            
            $table->unsignedBigInteger('assurance_actuelle');
            $table->unsignedBigInteger('assurance_vendu');
            $table->foreign('assurance_actuelle')->references('id')->on('assurances');
            $table->foreign('assurance_vendu')->references('id')->on('assurances');

            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
