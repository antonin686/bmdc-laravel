<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Medicine;
use App\Generic;

class PublicMedicineController extends Controller
{
    public function index()
    {
        $meds = DB::table('medicines')
                ->join('generics', 'medicines.generic_id', '=', 'generics.id')
                ->select('medicines.*', 'generics.generic_name')
                ->where('medicines.status', '=', '0')
                ->orderby('brand_name')
                ->get();
        return view('public.medicine.index')->with('meds', $meds);
    }

    public function show($id)
    {

        $medicine = Medicine::find($id);
        $generic = Generic::find($medicine->generic_id);

        $generic_info = (object) [
            'Indication' => $generic->indications,
            'Therapeutic Class' => $generic->therapeutic_class,
            'Pharmacology' => $generic->pharmacology,
            'Dosage & Administration' => $generic->dosage,
            'Interaction' => $generic->interection,
            'Contraindications' => $generic->contraindications,
            'Side Effects' => $generic->side_effects,
            'Pregnancy & Lactation' => $generic->pregnancy,
            'Precautions' => $generic->precautions,
            'Overdose Effects' => $generic->overdose_effects,
            'Storage Conditions' => $generic->storage_conditions,
        ];
        //dd($generic);
        return view('public.medicine.show', compact('medicine', 'generic', 'generic_info'));
    }

    public function genericBased($id)
    {
        
        $list = DB::table('medicines')
                ->join('generics', 'medicines.generic_id', '=', 'generics.id')
                ->select('medicines.*', 'generics.generic_name')
                ->where('medicines.generic_id', '=', $id)
                ->get();

        $gen = Generic::find($id);
        
        $meds = (object) [
            'list' => $list,
            'generic_name' => $gen->generic_name,
        ];

        return view('public.medicine.genericBased')->with('meds', $meds);
    }

    public function genericShow($id)
    {
        $generic = Generic::find($id);

        $meds = DB::table('medicines')
                ->join('generics', 'medicines.generic_id', '=', 'generics.id')
                ->select('medicines.*', 'generics.generic_name')
                ->where('medicines.generic_id', '=', $id)
                ->get();

        $generic_info = (object) [
            'Indication' => $generic->indications,
            'Therapeutic Class' => $generic->therapeutic_class,
            'Pharmacology' => $generic->pharmacology,
            'Dosage & Administration' => $generic->dosage_administration,
            'Interaction' => $generic->interaction,
            'Contraindications' => $generic->contraindications,
            'Side Effects' => $generic->side_effects,
            'Pregnancy & Lactation' => $generic->pregnancy,
            'Precautions' => $generic->precautions,
            'Overdose Effects' => $generic->overdose_effects,
            'Storage Conditions' => $generic->storage_conditions,
        ];

        return view('public.medicine.generic.show', compact('generic', 'generic_info', 'meds'));
    }


}
