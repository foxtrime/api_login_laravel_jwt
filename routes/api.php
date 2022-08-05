<?php

use Illuminate\Http\Request;

Route::post('login', 'Api\ApiUserController@login');
Route::post('register', 'Api\ApiUserController@register');

Route::get('patient', 'Api\ApiPatientController@index');
Route::post('patient', 'Api\ApiPatientController@store');
Route::get('patient/{id}', 'Api\ApiPatientController@show');
Route::put('patient/{id}', 'Api\ApiPatientController@editPatient');

//Route::get('patient', 'Api\ApiPatientController@patientdata');


Route::get('scheduling', 'Api\ApiSchedulingController@index');
Route::get('scheduling/all', 'Api\ApiSchedulingController@indexAll');
Route::post('scheduling', 'Api\ApiSchedulingController@store');
Route::get('scheduling/{id}', 'Api\ApiSchedulingController@show');
Route::delete('scheduling/{id}','Api\ApiSchedulingController@destroy');

Route::get('procedure', 'Api\ApiProcedureController@index');
Route::get('procedure/{id}', 'Api\ApiProcedureController@getProcedure');


Route::get('consultation', 'Api\ApiConsultationController@index');
Route::post('consultation', 'Api\ApiConsultationController@store');
Route::get('consultation/{id}', 'Api\ApiConsultationController@getConsulta');


Route::get('anamnese/{id}', 'Api\ApiAnamneseController@getAnamnese');
Route::put('anamnese/{id}', 'Api\ApiAnamneseController@editAnamnese');

Route::post('exams', 'Api\ApiExamController@store');
Route::get('exams/{id}', 'Api\ApiExamController@getExams');

Route::get('termos', 'Api\ApiTermoController@allTerms');

Route::post('termospatients','Api\ApiTermo_PatientController@create');
Route::get('linkTermo/{id}','Api\ApiTermo_PatientController@linkTermo');
Route::get('showAllPatientTermos/{id}','Api\ApiTermo_PatientController@showAllPatientTermos');


Route::post('createmensagem', 'Api\MensagemController@create');
Route::get('showmensagem/{id}','Api\MensagemController@getMensagem');












