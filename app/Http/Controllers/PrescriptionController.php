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
    
    public function index()
    {
        $prescs = DB::table('prescriptions')
                ->join('doctors', 'doctors.registration_id', '=', 'prescriptions.doctor_id')
                ->select('prescriptions.*', 'doctors.id as doc_id', 'doctors.full_name')
                ->get();

        return view('prescription.index')->with('prescs', $prescs);
    }

    public function show(Prescription $prescription)
    {
        $citizen = Citizen::where('nid', '=', $prescription->citizen_id)
                            ->orWhere('birthCer_id', '=', $prescription->citizen_id)
                            ->first();

        $from = new DateTime($citizen->dob);
        $to   = new DateTime('today');
        $citizen->age = $from->diff($to)->y;
        $prescription->date = $prescription->created_at->format('d/m/y'); 
        
        $doctor = Doctor::where('registration_id', '=', $prescription->doctor_id)->first();

        return view('prescription.show', compact('citizen', 'doctor', 'prescription'));
    }

}