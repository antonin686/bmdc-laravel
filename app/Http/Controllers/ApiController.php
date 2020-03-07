<?php

namespace App\Http\Controllers;
use App\Http\Resources\MedicineResource;
use Illuminate\Http\Request;
use DB;
use App\Medicine;
use App\Prescription;
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
        $presc = new Prescription;

        $presc->doctor_id = $request->doctor_id;
        $presc->citizen_id = $request->citizen_id;
        $presc->hospital_name = $request->hospital_name;
        $presc->mainbody = $request->mainbody;
        $presc->advice = $request->advice;
        $presc->disease = $request->disease;
        $presc->cc = $request->cc;
        $presc->oe = $request->oe;
        $presc->lx = $request->lx;
        $presc->save();
    }
}
