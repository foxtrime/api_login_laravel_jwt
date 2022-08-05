<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Termo;
use App\Models\Termo_Patient;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class Termo_PatientController extends Controller
{
    

    public function confirmarProcesso(Request $request , $numeroTermo)
    {

    	$termoAceito = DB::table('termos_patients')->where('id','=', $numeroTermo)->first();
    	$termoAceito->aceito = 1;

    	$teste = Termo_Patient::find($termoAceito->id);
        $teste->aceito = 1;
        $teste->save();

    	return response()->json($teste);
        
    }

    public function recusarProcesso(Request $request , $numeroTermo)
    {

    	$termoAceito = DB::table('termos_patients')->where('id','=', $numeroTermo)->first();
    	$termoAceito->recusado = 1;

    	$teste = Termo_Patient::find($termoAceito->id);
        $teste->recusado = 1;
        $teste->save();

    	return response()->json($teste);
        
    }

}
