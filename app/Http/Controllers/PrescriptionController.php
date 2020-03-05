<?php

namespace App\Http\Controllers;

use DB;
use DateTime;
use App\Prescription;
use App\Citizen;
use App\Doctor;

use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prescs = DB::table('prescriptions')
                ->join('doctors', 'doctors.id', '=', 'prescriptions.doctor_id')
                ->select('prescriptions.*', 'doctors.id as doc_id', 'doctors.first_name', 'doctors.last_name')
                ->get();
        return view('prescription.index')->with('prescs', $prescs);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show(Prescription $prescription)
    {
        $citizen = Citizen::where('nid', '=', $prescription->citizen_id)
                            ->orWhere('birthCer_id', '=', $prescription->citizen_id)
                            ->first();

        $from = new DateTime($citizen->dob);
        $to   = new DateTime('today');
        $citizen->age = $from->diff($to)->y;
        $prescription->date = $prescription->created_at->format('d/m/y'); 
        
        $doctor = Doctor::find($prescription->doctor_id);

        return view('prescription.show', compact('citizen', 'doctor', 'prescription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        //
    }
}