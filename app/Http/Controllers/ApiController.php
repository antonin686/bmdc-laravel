<?php

namespace App\Http\Controllers;
use App\Http\Resources\MedicineResource;
use App\Http\Resources\PrescriptionResource;
use Illuminate\Http\Request;
use DB;
use App\Medicine;
use App\Prescription;
use App\Citizen;
use App\Doctor;
use App\Generic;
use DateTime;
use Exception;

class ApiController extends Controller
{
    public function medicineList()
    {
        $meds = DB::table('medicines')
                ->join('generics', 'medicines.generic_id', '=', 'generics.id')
                ->select('medicines.*', 'generics.generic_name')
                ->get();
       
        return new MedicineResource($meds);
    }

    public function medicineInfo($id)
    {
        $meds = DB::table('medicines')
                ->join('generics', 'medicines.generic_id', '=', 'generics.id')
                ->select('medicines.*', 'generics.generic_name')
                ->where('medicines.id', '=', $id)->get();
       
        return new MedicineResource($meds);
    }

    public function prescriptionInfo($id)
    {
        $prescription = Prescription::find($id);

        $citizen = Citizen::where('nid', '=', $prescription->citizen_id)
                            ->orWhere('birthCer_id', '=', $prescription->citizen_id)
                            ->select('first_name', 'last_name', 'dob')
                            ->first();

        $from = new DateTime($citizen->dob);
        $to   = new DateTime('today');
        $citizen->age = $from->diff($to)->y;
        $prescription->date = $prescription->created_at->format('d/m/y'); 
        
        $doctor = Doctor::select('full_name', 'email', 'phone', 'work_place', 'speciality', 'basic_degree', 'advance_degree', 'registration_id')
        ->where('id', '=', $prescription->doctor_id)->first();
        
        $datas = [
            'citizen' => $citizen,
            'doctor' => $doctor,
            'prescription' => $prescription,
        ];

        return new PrescriptionResource($datas);
    }

    public function prescriptionListByCitizen($id)
    {
        $prescription = Prescription::where('citizen_id', '=', $id)->get();

    
        if(count($prescription) == 0)
        {
            return "no data";
        }

        $citizen = Citizen::where('nid', '=', $prescription[0]->citizen_id)
                            ->orWhere('birthCer_id', '=', $prescription[0]->citizen_id)
                            ->select('first_name', 'last_name', 'dob')
                            ->first();

        $from = new DateTime($citizen->dob);
        $to   = new DateTime('today');
        $citizen->age = $from->diff($to)->y;
        
        
        $datas =  [
            'citizen' => $citizen,
            'prescription' => $prescription,
        ];

        return new PrescriptionResource($datas);
    }

    public function prescriptionStore(Request $request)
    {
        if($request->doctor_id && $request->citizen_id && $request->hospital_name && $request->med_list && $request->disease && $request->date)
        {
            $presc = new Prescription;

            $presc->doctor_id = $request->doctor_id;
            $presc->citizen_id = $request->citizen_id;
            $presc->hospital_name = $request->hospital_name;
            $presc->mainbody = trim($request->mainbody);
            $presc->med_list = $request->med_list;
            $presc->disease = $request->disease;
            $presc->cc = $request->cc;
            $presc->oe = $request->oe;
            $presc->lx = $request->lx;
            $presc->date = new DateTime($request->date);
            try {
                $presc->save();
            } catch (Exception $e) {
    
                return "fill all the nessesary values";
            }
            
            return "success";
        }
        
        return "fill all the nessesary values";
        
    }


    public function complainStore(Request $request)
    {
         
        return $request;
    }

}