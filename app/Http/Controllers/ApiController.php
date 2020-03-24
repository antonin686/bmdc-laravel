<?php

namespace App\Http\Controllers;
use App\Http\Resources\MedicineResource;
use Illuminate\Http\Request;
use DB;
use App\Medicine;
use App\Prescription;
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

    public function prescriptionStore(Request $request)
    {
        //dd($request->data_packet);

        $dataset = json_decode($request->data_packet);

        $presc = new Prescription;

        $presc->doctor_id = $dataset->doctor_id;
        $presc->citizen_id = $dataset->citizen_id;
        $presc->hospital_name = $dataset->hospital_name;
        $presc->mainbody = trim($dataset->mainbody);
        $presc->med_list = $dataset->med_list;
        $presc->disease = $dataset->disease;
        $presc->cc = $dataset->cc;
        $presc->oe = $dataset->oe;
        $presc->lx = $dataset->lx;
        $presc->date = new DateTime($dataset->date);

        try {
            $presc->save();
        } catch (Exception $e) {

            return "fill all the nessesary values";
        }
        
        return "success";      
    }
}
