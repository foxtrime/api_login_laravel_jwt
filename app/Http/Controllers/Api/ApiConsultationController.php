<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadRequest;
use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\Image_Consultation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;



class ApiConsultationController extends Controller
{

   public function index()
   {
      $consultation = Consultation::with('consultationImage','procedures','schedules')->get();

      //$contents = Storage::get('photos/vazq8MIDJsILCIV3Y45Jora0ZNfAn2Tn6HDS3dnG.jpeg');

      return response()->json(
            $consultation
        );

   }

   public function getConsulta($id){

      // $consultation = Consultation::with('consultationImage','procedures','schedules')->where('schedules','=',$id)->get();
     
     // $consultation = Consultation::with(["schedules" => function($q){
     //  return $q->where('schedules.patient_id', '=', 3);
     // }]);
      
      $consultation = Consultation::with('consultationImage','procedures','schedules')->whereHas('schedules', function($query) use($id){
         return $query->where('patient_id','=',$id);
      })->get();

     //dd($consultation);

      // Event::with(["participants" => function($q){
      //    $q->where('participants.IdUser', '=', 1);
      // }]);


      return response()->json(
            $consultation
        );

   }

   public function store(Request $request)
   {
      $consultation = Consultation::create([
         'schedules_id' => $request['schedules_id'],
         'procedures_id' => $request['procedures_id'],    		
      ]);


      $images = Collection::wrap(request()->file('consultationimage'));
     //die(json_encode($images));
      //$directory = 'uploads';    

      foreach ($images as $imagem) {
        //dd($imagem);
         $filename = $imagem->store('uploads');
         // dd($filename);

         Image_Consultation::create([
            'consultations_id' => $consultation->id,
            'name' => "teste",
            'filename'=> $filename,
            // 'extensao' => ,
         ]);
      }
         // foreach ($request['consultationimage'] as $imagem) {
            

         //    $filename = $imagem['filename']->store('uploads');

         //       Image_Consultation::create([
         //       'consultations_id' => $consultation->id,
         //       //'name' => $imagem['name'],
         //       'filename' => $filename,
         //       //'extensao' => $imagem['filename']->extension(),
         //    ]);
         // }

      $data = $request->all();
      
      return response()->json([
      'success'   =>  true,
      'data'      =>  $data, 
      //'teste' => $images
      
      ],201);
   
   }
}

