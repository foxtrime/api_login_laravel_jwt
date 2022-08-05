<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('schedules_id')->unsigned();
            $table->integer('procedures_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('consultations', function($table){
            $table->foreign('schedules_id')->references('id')->on('schedules')->onDelete('cascade');
            $table->foreign('procedures_id')->references('id')->on('procedures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
}
