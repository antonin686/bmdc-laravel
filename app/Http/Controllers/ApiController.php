<?php

namespace App\Http\Controllers;
use App\Http\Resources\MedicineResource;
use Illuminate\Http\Request;
use DB;
use App\Medicine;
class ApiController extends Controller
{
    public function MedicineList()
    {
        $meds = DB::table('medicines')
                ->join('generics', 'medicines.generic_id', '=', 'generics.id')
                ->select('medicines.*', 'generics.generic_name')
                ->get();
       
        return new MedicineResource($meds);
    }

    public function MedicineInfo($id)
    {
        $meds = DB::table('medicines')
                ->join('generics', 'medicines.generic_id', '=', 'generics.id')
                ->select('medicines.*', 'generics.generic_name')
                ->where('medicines.id', '=', $id)->get();
       
        return new MedicineResource($meds);
    }
}
