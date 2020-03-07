<?php

namespace App\Http\Controllers;

use App\Medicine;
use App\AuthorizeMedicine;
use App\Generic;
use DB;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meds = DB::table('medicines')
                ->join('generics', 'medicines.generic_id', '=', 'generics.id')
                ->select('medicines.*', 'generics.generic_name')
                ->where('medicines.status', '=', '0')
                ->get();
        return view('medicine.index')->with('meds', $meds);
    }

    public function removedMeds()
    {
        $meds = DB::table('medicines')
                ->join('generics', 'medicines.generic_id', '=', 'generics.id')
                ->select('medicines.*', 'generics.generic_name')
                ->where('medicines.status', '=', '1')
                ->get();
        return view('medicine.removed')->with('meds', $meds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generics = Generic::all();
        return view('medicine.create')->with('generics', $generics);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'brand_name' => 'required',
            'dosage_form' => 'required',
            'generic' => 'required|numeric',
            'strength' => 'required',
            'company' => 'required',
            'price' => 'required',
        ]);

        $med = new Medicine;
        $med->brand_name = $request->brand_name;
        $med->dosage_form = $request->dosage_form;
        $med->generic_id = $request->generic;
        $med->strength = $request->strength;
        $med->company = $request->company;
        $med->price = $request->price; 
        $med->save();
        
        $authMed = AuthorizeMedicine::where('id', '=', $request->id)->first();
        if($authMed)
        {
            $authMed->status = 1;
            $authMed->save();
        }

        $message = "Medicine Created Successfully";
        
        return redirect()->route('medicine.index')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
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
        return view('medicine.show', compact('medicine', 'generic', 'generic_info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        $generics = Generic::all();
        return view('medicine.edit', compact('generics', 'medicine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        $med = Medicine::find($medicine->id);
        $med->brand_name = $request->brand_name;
        $med->dosage_form = $request->dosage_form;
        $med->generic_id = $request->generic;
        $med->strength = $request->strength;
        $med->company = $request->company;
        $med->price = $request->price;
        $med->save();

        return redirect()->route('medicine.show', $medicine->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        $trash = Medicine::find($medicine->id);
        $trash->status = 1;  
        $trash->save();

        return redirect()->route('medicine.index');
    }

    public function removeUndo($id)
    {
        $med = medicine::find($id);
        $med->status = 0;
        $med->save();
        
        return redirect()->route('medicine.index');   
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

        return view('medicine.genericBased')->with('meds', $meds);
    }
}
