<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnamneseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anamnese', function (Blueprint $table) {
            $table->increments('id');

            $table->boolean('tratamento_medico')   ->default(false);
            $table->text('tratamentomedicotexto') ->nullable();
            $table->boolean('doenca_resp')    ->default(false);
            $table->boolean('pressao_arte')    ->default(false);
            $table->boolean('alergia')    ->default(false);
            $table->text('alergiatexto') ->nullable();
            $table->boolean('hepatite')    ->default(false);
            $table->boolean('diabetes')    ->default(false);
            $table->boolean('gravidez')    ->default(false);
            $table->boolean('bifosfonatos')    ->default(false);
            $table->boolean('cirurgia')    ->default(false);
            $table->text('cirurgiatexto') ->nullable();
            $table->boolean('medicamentos')    ->default(false);
            $table->text('medicamentostexto') ->nullable();
            $table->boolean('receitado')    ->default(false);       
            $table->boolean('sangramento')    ->default(false);
            $table->boolean('sangra_facil')    ->default(false);
            $table->boolean('sensibilidade')    ->default(false);
            $table->boolean('gosto_ruim')    ->default(false);
            $table->boolean('ferida_dez')    ->default(false);
            $table->boolean('estala')    ->default(false);
            $table->boolean('dor_ouvido')    ->default(false);
            $table->boolean('anestesia')    ->default(false);
            $table->boolean('convulsao')    ->default(false);
            $table->boolean('sinusite')    ->default(false);
            $table->boolean('febre_reumatica')    ->default(false);
            $table->integer('patient_id')->unsigned();

            $table->timestamps();
        });

         Schema::table('anamnese', function($table){
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anamnese');
    }
}
