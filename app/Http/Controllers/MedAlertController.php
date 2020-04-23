<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Generic;
use App\Medicine;
use App\MedAlert;
use DB;

class MedAlertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function message()
    {
        return view('medicine.alert.message');
    }

    public function index()
    {
        $meds = DB::table('med_alerts')
            ->join('medicines', 'medicines.id', '=', 'med_alerts.med_id')
            ->select('med_alerts.*', 'medicines.brand_name', 'medicines.strength')
            ->where('medicines.status', '=', '0')
            ->get();

        return view('medicine.alert.index')->with('meds', $meds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicines = Medicine::all();
        return view('medicine.alert.create')->with('medicines', $medicines);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'med_id' => 'required|numeric',
            'alert_gender' => 'required',
            'age_range_low' => 'required|numeric',
            'age_range_high' => 'required|numeric',
            'alert_range' => 'numeric',
            'max_duration' => 'numeric',
        ]);

        $med_alert = MedAlert::create($request->all());

        $message = "Medicine Alert for $med_alert->med_id Has Been Created Successfully";

        return redirect()->route('medAlert.message')->with('message', $message)
                                                        ->with('id', $med_alert->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MedAlert $med_alert, $id)
    {
        $med_alert = MedAlert::find($id);
        $medicine = Medicine::find($med_alert->med_id);
        $generic = Generic::find($medicine->generic_id);

        return view('medicine.alert.show', compact('med_alert', 'medicine', 'generic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $med_alert = MedAlert::find($id);
        $medicine = Medicine::find($med_alert->med_id);
        $generic = Generic::find($medicine->generic_id);

        return view('medicine.alert.edit', compact('med_alert', 'medicine', 'generic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $med_alert = MedAlert::find($id);
        $med_alert->update($request->all());
        $medicine = Medicine::find($med_alert->med_id);

        $message = "Medicine Alert For ".$medicine->brand_name." has been successfully updated!!!";

        return redirect()->route('medAlert.message')->with('message', $message)->with('id', $med_alert->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
