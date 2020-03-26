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

    public function medicineApplicationIndex()
    {
        $apps = DB::table('authorize_medicines')
                ->join('generics', 'authorize_medicines.generic_id', '=', 'generics.id')
                ->select('authorize_medicines.*', 'generics.generic_name')
                ->where('authorize_medicines.status', '=', '0')
                ->get();

        return view('application.medicine.index')->with('apps', $apps);
    }

    public function medicineApplicationCreate()
    {
        $generics = Generic::all();
        return view('application.medicine.create')->with('generics', $generics);
    }

    public function medicineApplicationStore(Request $request)
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
            'image' => 'required',
        ]);

        $file = $request->file('image');
        $name = "";

        if($file)
        {
            $name = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads', $name);
        }

        $path = "/uploads/".$name;

        $med = new AuthorizeMedicine;
        $med->brand_name = $request->brand_name;
        $med->dosage_form = $request->dosage_form;
        $med->generic_id = $request->generic;
        $med->strength = $request->strength;
        $med->company = $request->company;
        $med->price = $request->price;
        $med->img_path = $path;
        $med->applicant_name = $request->applicant_name;
        $med->applicant_email = $request->applicant_email;
        $med->applicant_phone = $request->applicant_phone;
        $med->save();

        $message = "Medicine Application Successfully Send !!!";

        return redirect()->route('application.message')->with('message', $message);
    }

    public function medicineApplicationShow($id)
    {
        $medicine = AuthorizeMedicine::find($id);
        $generics = Generic::all();
        return view('application.medicine.show', compact('medicine', 'generics'));
    }

    //Doctor

    public function doctorApplicationIndex()
    {
        $apps = AuthorizeDoctor::where('status', '=', '0')->get();
        return view('application.doctor.index')->with('apps', $apps);
    }

    public function doctorApplicationCreate()
    {
        return view('application.doctor.create');
    }

    public function doctorApplicationStore(Request $request)
    {
        $this->validate($request,[
            'nid' => 'required|unique:doctors',
            'full_name' => 'required',
            'phone' => 'required|numeric|min:11|unique:doctors',
            'email' => 'required|email',
            'basic_degree' => 'required',
            'advance_degree' => 'required',
            'speciality' => 'required',
            'work_place' => 'required',
            'image' => 'required',
        ]);
        
        $file = $request->file('image');
        $name = "";

        if($file)
        {
            $name = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads', $name);
        }

        $path = "/uploads/".$name;

        $doc = new AuthorizeDoctor();
        $doc->nid = $request->nid;
        $doc->full_name = $request->full_name;
        $doc->email = $request->email;
        $doc->phone = $request->phone;
        $doc->basic_degree = $request->basic_degree;
        $doc->advance_degree = $request->advance_degree;
        $doc->speciality = $request->speciality;
        $doc->work_place = $request->work_place;
        $doc->img_path = $path;
        $doc->save();

        $message = "Doctor Application Successfully Send !!!";

        return redirect()->route('application.message')->with('message', $message);
    }

    public function doctorApplicationShow($id)
    {
        $app = AuthorizeDoctor::find($id);

        return view('application.doctor.show')->with('app', $app);
    }


}