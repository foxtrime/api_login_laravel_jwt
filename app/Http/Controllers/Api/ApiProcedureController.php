<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Procedure;
use App\Models\Image_Procredure;
use Illuminate\Support\Facades\Storage;



class ApiProcedureController extends Controller
{

  public function index()
  {
  	$procedure = Procedure::with('procedureImage')->get();

    // $contents = Storage::get('public/photos/0Y2RJbjhUFNUxFg5B3rhsNijuwkaxLXhmpQPjftl.jpeg');
    // dd($contents);

  	return response()->json(
            $procedure
        );
  }

  public function getProcedure ($id)
  {
  	$procedure = Procedure::with('procedureImage')->where('id','=', $id)->first();

  	return response()->json(
            $procedure
        );
  }


}
