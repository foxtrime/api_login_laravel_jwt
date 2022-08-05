<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Anamnese;
use JWTAuth;
use App\User;

class ApiPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $patientUser = Patient::with('patientScheduling')->where('user_id','=',auth()->user()->id)->get();

        return response()->json(
            $patientUser
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
        $user  = auth()->user()->id;

        $patient = new Patient();
        $patient->id = $request->id;
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->telephone = $request->telephone;
        $patient->date_nasc = $request->date_nasc;
        $patient->address = $request->address;
        $patient->RG = $request->RG;
        $patient->CPF = $request->CPF;
        $patient->name_resp = $request->name_resp;
        $patient->RG_resp = $request->RG_resp;
        $patient->CPF_resp = $request->CPF_resp;
        $patient->user_id = $user;

        $patient->save();

        $anamnese = Anamnese::create([
            'patient_id' => $patient->id,
        ]);



        return response()->json([
            'success'   =>  true,
            'data'      =>  $patient 
        ],201);

    }


    public function editPatient(Request $request, $id){
        $patient = Patient::find($id);

        $patient->fill($request->all());
        // dd($patient);
        $patient->save();
        // dd($patient);
        return response()->json([
                'data' => $patient
        ]);
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
        //
    }

}
