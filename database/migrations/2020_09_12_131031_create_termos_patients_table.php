<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermosPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('termos_patients', function (Blueprint $table) {
            $table->increments('id');

            $table->boolean('aceito')    ->default(false);
            $table->boolean('recusado')  ->default(false);


            $table->integer('termos_id')->unsigned();
            $table->integer('patients_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('termos_patients', function($table){
            $table->foreign('termos_id')->references('id')->on('termos')->onDelete('cascade');
            $table->foreign('patients_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('termos_patients');
    }
}
