<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\AuthorizationRejectedMail;
use App\Mail\EmailVerificationMail;
use Illuminate\Support\Facades\Mail;

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

    public function medicineApplicationDestroy($id)
    {
        $med = AuthorizeMedicine::find($id);
        $med->status = 2;
        $med->save();

        $data = (object) [
            'name' => $med->applicant_name,
            'message' => 'Your Application For Medicine Authorization Has Been Rejected'
        ];
        
        Mail::to($med->applicant_email)->send(new AuthorizationRejectedMail($data));

        return redirect()->route('application.medicineApplicationIndex');
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
        $apps = AuthorizeDoctor::where('status', '=', '1')->get();
        return view('application.doctor.index')->with('apps', $apps);
    }

    public function doctorApplicationCreate()
    {
        return view('application.doctor.create');
    }

    public function doctorApplicationDestroy($id)
    {
        $app = AuthorizeDoctor::find($id);
        $app->status = 3;
        $app->save();

        $data = (object) [
            'name' => $app->full_name,
            'message' => 'Your Application For Doctor Authorization Has Been Rejected'
        ];
        
        Mail::to($app->email)->send(new AuthorizationRejectedMail($data));

        return redirect()->route('application.doctorApplicationIndex');
    }

    public function doctorApplicationStore(Request $request)
    {
        $this->validate($request,[
            'nid' => 'required|unique:doctors|unique:authorize_doctors',
            'full_name' => 'required',
            'phone' => 'required|numeric|min:11|unique:doctors|unique:authorize_doctors',
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

        $message = "Please Verify Your Email Address !";

        $data = (object) [        
            'name' => $doc->full_name,
            'url' => url('/api/doctor/email/verify/'.$doc->id),
        ];
        
        Mail::to($doc->email)->send(new EmailVerificationMail($data));

        return redirect()->route('application.message')->with('message', $message);
    }

    public function doctorApplicationShow($id)
    {
        $app = AuthorizeDoctor::find($id);

        return view('application.doctor.show')->with('app', $app);
    }


}