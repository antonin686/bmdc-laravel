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
}
