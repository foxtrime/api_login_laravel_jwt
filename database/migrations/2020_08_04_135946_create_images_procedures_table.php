<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_procedures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('filename');
            // $table->mediumText('blob_img');

            $table->integer('procedures_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('images_procedures', function($table){
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
        Schema::dropIfExists('images_procedures');
    }
}
