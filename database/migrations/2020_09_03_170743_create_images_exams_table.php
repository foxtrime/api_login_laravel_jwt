<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_exams', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('filename');

            $table->integer('exams_id')->unsigned();

            $table->timestamps();
        });


        Schema::table('images_exams', function($table){
            $table->foreign('exams_id')->references('id')->on('exams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images_exams');
    }
}
