<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mensagem;
use Carbon\Carbon;

class MensagemController extends Controller
{
    public function create(Request $request){

    	$date = Carbon::now('America/Bahia')->format('Y-m-d');

    	$mensagem = new Mensagem();

    	// $msg->id = $request->id;
        $mensagem->patient_id = $request->patient_id;
        $mensagem->msg = $request->msg;
        $mensagem->date = $date;

        $mensagem->save();

        return response()->json(
			 $mensagem 
        );

    }

    public function getMensagem($id){

    	$mensagem = Mensagem::all()->where('patient_id','=',$id);


    	return response()->json(
          $mensagem
      	);
    }
}
