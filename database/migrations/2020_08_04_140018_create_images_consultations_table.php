<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_consultations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('filename');
            // $table->mediumText('extensao');

            $table->integer('consultations_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('images_consultations', function($table){
            $table->foreign('consultations_id')->references('id')->on('consultations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images_consultations');
    }
}
