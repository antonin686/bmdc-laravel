<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AuthorizeDoctor;
use App\AuthorizeMedicine;
use App\Generic;
use DB;

class ApplicationController extends Controller
{
    public function message()
    {
        return view('application.message');
    }

    public function medicineIndex()
    {
        $apps = DB::table('authorize_medicines')
                ->join('generics', 'authorize_medicines.generic_id', '=', 'generics.id')
                ->select('authorize_medicines.*', 'generics.generic_name')
                ->where('authorize_medicines.status', '=', '0')
                ->get();

        return view('application.medicine.index')->with('apps', $apps);
    }

    public function medicineCreate()
    {
        $generics = Generic::all();
        return view('application.medicine.create')->with('generics', $generics);
    }

    public function medicineStore(Request $request)
    {

        $this->validate($request,[
            'brand_name' => 'required',
            'dosage_form' => 'required',
            'generic' => 'required|numeric',
            'strength' => 'required',
            'company' => 'required',
            'price' => 'required',
            'applicant_name' => 'required',
            'applicant_email' => 'required|email',
            'applicant_phone' => 'required',
        ]);

        $med = new AuthorizeMedicine;
        $med->brand_name = $request->brand_name;
        $med->dosage_form = $request->dosage_form;
        $med->generic_id = $request->generic;
        $med->strength = $request->strength;
        $med->company = $request->company;
        $med->price = $request->price;
        $med->applicant_name = $request->applicant_name;
        $med->applicant_email = $request->applicant_email;
        $med->applicant_phone = $request->applicant_phone;
        $med->save();

        $message = "Medicine Application Successfully Send !!!";

        return redirect()->route('application.message')->with('message', $message);
    }

    public function medicineShow($id)
    {
        $medicine = AuthorizeMedicine::find($id);
        $generics = Generic::all();
        return view('application.medicine.show', compact('medicine', 'generics'));
    }
}