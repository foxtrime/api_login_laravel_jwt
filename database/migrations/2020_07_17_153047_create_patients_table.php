<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('telephone');
            $table->string('date_nasc');
            $table->string('address');
            $table->string('RG');
            $table->string('CPF');
            $table->string('name_resp')->nullable();
            $table->string('RG_resp')->nullable();
            $table->string('CPF_resp')->nullable();
            
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

         Schema::table('patients', function($table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
