<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Scheduling;
use App\User;
use JWTAuth;
use Carbon\Carbon;

class ApiSchedulingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
   {   

        $date = Carbon::now('America/Bahia')->subDay(1);
        $dateEnd = Carbon::now('America/Bahia')->addDay(3);


         //$result = Receita::whereBetween('data', array($start, $end))->all();

    $schedules = Scheduling::with('shcedulingPatient')->where('user_id','=', auth()->user()->id)->whereBetween('date',array($date, $dateEnd))->orderBy('date','ASC')->get();

      //$schedules = Scheduling::with('shcedulingPatient')->where('user_id','=', auth()->user()->id)->where('date','=',DB::raw('curdate()'))->get();

      return response()->json(
         $schedules  
      );
       
      // $user  = auth()->user()->userScheduling;
      // return response()->json(
      //     $user
      // );
    }

    public function indexAll(Request $request){
      
      $schedules = Scheduling::with('shcedulingPatient')->where('user_id','=', auth()->user()->id)->get();

      return response()->json([

         'status' => 'ok', 
         'data' => $schedules,
      ]);


    }


      
    public function store(Request $request)
    {
        
         $user  = auth()->user()->id;

        $schedules = new Scheduling();
        $schedules->date = $request->date;
        $schedules->hour = $request->hour;
        $schedules->location = $request->location;
        $schedules->obs = $request->obs;
        $schedules->recurrence = $request->recurrence;
        $schedules->procedure = $request->procedure;
        $schedules->patient_id = $request->patient_id;
        $schedules->user_id = $user;


        $schedules->save();

        return response()->json([
            'success'   =>  true,
            'data'      =>  $schedules 
        ],201);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedules = Scheduling::find($id);

        $schedules->delete();

        return response([
            'success' => true, 
        ],200);
    }
}
