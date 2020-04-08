<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

use App\Doctor;
use App\DoctorModify;

class DoctorModifyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = DB::table('doctor_modifies')
        ->join('doctors', 'doctors.registration_id', '=', 'doctor_modifies.registration_id')
        ->select('doctor_modifies.*', 'doctors.id as doctor_id', 'doctors.full_name')
        ->where('doctor_modifies.status', '=', 0)->get();

        return view('doctor.modify.index')->with('results', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->doctor_id){
            return "Doctor ID is Not Given";
        }

        $doctor = Doctor::where('registration_id', '=', $request->doctor_id)->first();


        if(!$doctor)
        {
            return "That Doctor Does Not Exits";
        }

        $docMod = new DoctorModify;
        
        $docMod->full_name = $request->full_name;
        $docMod->email = $request->email;
        $docMod->phone = $request->phone;
        $docMod->work_place = $request->work_place;
        $docMod->speciality = $request->speciality;
        $docMod->basic_degree = $request->basic_degree;
        $docMod->advance_degree = $request->advance_degree;
        $docMod->doctor_registration_id = $request->doctor_id;
        $docMod->save();

        return $docMod->id;
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
