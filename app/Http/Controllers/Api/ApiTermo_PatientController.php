<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Termo;
use App\Models\Termo_Patient;
use App\Models\Patient;


class ApiTermo_PatientController extends Controller
{
    
	public function showAllPatientTermos($id){
		$termo_patient = Termo_Patient::with('termos')->where('patients_id','=',$id)->get();

			return response()->json(
				$termo_patient
			);


	}

	public function linkTermo($id){

		$termo_patient = Termo_Patient::with('patients','termos')->find($id);


		return view('termo', compact('termo_patient'));

	}

    public function create(Request $request){

    	$termo_patient = new Termo_Patient();

    	$termo_patient->termos_id = $request->termos_id;
    	$termo_patient->patients_id = $request->patients_id;

    	$termo_patient->save();


    	return response()->json(
             $termo_patient 
        ,201);
    }
}
