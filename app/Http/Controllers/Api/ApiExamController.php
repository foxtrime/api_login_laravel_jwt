<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use App\Models\Exams;
use App\Models\Image_Exams;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;



class ApiExamController extends Controller
{
    
    public function store(Request $request)
    {
    	$exams = Exams::create([
    		'name' => $request['name'],
    		'date' => $request['date'],
    		'patient_id' => $request['patient_id'],
    	]);

    	$images = Collection::wrap(request()->file('examimage'));

     // dd($images);

    	// $directory = 'uploadsExams';  

    	foreach ($images as $imagem) {
        //dd($imagem);
         $filename = $imagem->store('uploadsExams');

         Image_Exams::create([
            'exams_id' => $exams->id,
            'filename'=> $filename,
         ]);
      }

      $data = $request->all();
      
      return response()->json([
      'success'   =>  true,
      'data'      =>  $data, 
      //'teste' => $images
      
      ],201);

    }

   public function getExams($id)
   {

    // $exam = Exams::with('examsImage')->where('id','=',$id)->get();

    // $exams = Exams::with('examsImage')->whereHas('patients', function($query) user($id){
    //     return $query->where('patient_id','=',$id);
    // })->get();

    $exam = Exams::with('examsImage')->where('patient_id','=',$id)->get();
     
      // $consultation = Consultation::with('consultationImage','procedures','schedules')->whereHas('schedules', function($query) use($id){
      //    return $query->where('patient_id','=',$id);
      // })->get();

        return response()->json(
            $exam
        );
   }

}
