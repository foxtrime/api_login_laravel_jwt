<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anamnese;
use App\Models\Patient;

class ApiAnamneseController extends Controller
{
    
    public function getAnamnese($id)
    {

    	$anamnese = Anamnese::where('patient_id', '=', $id)->first();
    	// $anamnese = Anamnese::find($id)->where('patient_id', '=', '13')->get();

    	return response()->json(
            $anamnese
        );
    }

    public function editAnamnese(Request $request, $id){
    	$anamnese = Anamnese::find($id);

    	$anamnese->fill($request->all());

    	 $anamnese->save();

    	// dd($anamnese);

    	return response()->json([
    			'data' => $anamnese
    	]
    	
    	);

    }
}
