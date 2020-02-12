<?php

namespace App\Http\Controllers;

use App\Generic;
use Illuminate\Http\Request;

class GenericController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generics = Generic::all();

        return view('medicine.generic.index')->with('generics', $generics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicine.generic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $generic = new Generic;

        $generic->generic_name = $request->generic_name;
        $generic->indications = $request->indications;
        $generic->therapeutic_class = $request->therapeutic_class;
        $generic->pharmacology = $request->pharmacology;
        $generic->dosage_administration = $request->dosage_administration;
        $generic->interaction = $request->interaction;
        $generic->contraindications = $request->contraindications;
        $generic->side_effects = $request->side_effects;
        $generic->pregnancy = $request->pregnancy;
        $generic->precautions = $request->precautions;
        $generic->overdose_effects = $request->overdose_effects;
        $generic->storage_conditions = $request->storage_conditions;
        $generic->save();

        return redirect()->route('generic.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Generic  $generic
     * @return \Illuminate\Http\Response
     */
    public function show(Generic $generic)
    {
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

        return view('medicine.generic.show', compact('generic', 'generic_info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Generic  $generic
     * @return \Illuminate\Http\Response
     */
    public function edit(Generic $generic)
    {
        return view('medicine.generic.edit')->with('generic', $generic);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Generic  $generic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Generic $generic)
    {
        $generic = Generic::find($generic->id);

        $generic->generic_name = $request->generic_name;
        $generic->indications = $request->indications;
        $generic->therapeutic_class = $request->therapeutic_class;
        $generic->pharmacology = $request->pharmacology;
        $generic->dosage_administration = $request->dosage_administration;
        $generic->interaction = $request->interaction;
        $generic->contraindications = $request->contraindications;
        $generic->side_effects = $request->side_effects;
        $generic->pregnancy = $request->pregnancy;
        $generic->precautions = $request->precautions;
        $generic->overdose_effects = $request->overdose_effects;
        $generic->storage_conditions = $request->storage_conditions;
        $generic->save();

        return redirect()->route('generic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Generic  $generic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Generic $generic)
    {
        //
    }
}
