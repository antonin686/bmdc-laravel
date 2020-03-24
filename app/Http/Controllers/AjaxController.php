<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Doctor;
use App\Medicine;
use App\Generic;
use App\Prescription;
use App\AuthorizeDoctor;
use App\AuthorizeMedicine;
use Input;

class AjaxController extends Controller
{
    public function adminHomeCounts(Request $request)
    {     
        if($request->ajax())
        {
            $doctor = Doctor::all();
            $medicine = Medicine::all();
            $generic = Generic::all();
            $prescription = Prescription::whereDate('created_at', Carbon::today())->get();
            $doctorApp = AuthorizeDoctor::where('status', '=', '0')->get();
            $medicineApp = AuthorizeMedicine::where('status', '=', '0')->get();

            $result = [
                count($doctor),
                count($medicine),
                count($generic),
                count($prescription),
                count($doctorApp),
                count($medicineApp),
            ];
            
            return $result;
        }
    }
    
    public function getDoctorDetails(Request $request, $id)
    {    
        if($request->ajax())
        {
            $doctor = Doctor::select('id', 'full_name', 'last_name', 'speciality', 'basic_degree', 'institute', 'img_path','email')->where('id', $id)->get();

            return $doctor;
        }
    }

    public function generateDoctorID(Request $request)
    {    

        if($request->ajax() or true)
        {
            $maxID = Doctor::max('id');

            $maxID = $maxID ? $maxID + 1 : 1;

            $maxID = str_pad($maxID, 6, '0', STR_PAD_LEFT);

            $time = Carbon::now();

            $year = substr($time->year, -2);
            
            $month = $time->month <= 9 ? '0'.$time->month : $time->month;
            
            $day = $time->day <= 9 ? '0'.$time->day : $time->day;
            
            $id = $year.$month.$day.$maxID;

            return $id;
        }
    }
}