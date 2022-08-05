<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Termo;

class ApiTermoController extends Controller
{
    public function allTerms(){

    	$termos = Termo::all();

    	return response()->json(
             $termos
         );

    }
}
