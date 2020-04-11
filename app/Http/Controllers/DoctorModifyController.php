<?php

namespace App\Http\Controllers;

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
        $doctor = DB::table('doctor_modifies')
        ->join('doctors', 'doctors.registration_id', '=', 'doctor_modifies.doctor_registration_id')
        ->select('doctors.speciality', 'doctors.basic_degree', 'doctors.advance_degree','doctor_modifies.id', 'doctors.full_name')
        ->where('doctor_modifies.status', '=', 0)->get();

        //dd($doctor);

        return view('doctor.modify.index')->with('doctors', $doctor);
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
    public function show(DoctorModify $doctorModify)
    {
        $doctor = Doctor::where('registration_id', $doctorModify->doctor_registration_id)->first();


       

        return view('doctor.modify.show', compact('doctorModify', 'doctor'));
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