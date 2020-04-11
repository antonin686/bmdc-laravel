<?php

namespace App\Http\Controllers;

use App\AuthorizeDoctor;
use App\Doctor;
use App\DoctorModify;
use App\User;
use Hash;
use Auth;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function message()
    {
        return view('doctor.message');
    }

    public function index()
    {
        $docs = Doctor::where('status', '=', '0')->get();
        return view('doctor.index')->with('docs', $docs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'full_name' => 'required',
            'nid' => 'required|unique:doctors',
            'registration_id' => 'required|unique:doctors',
            'phone' => 'required|numeric|min:11',
            'email' => 'required|email',
            'basic_degree' => 'required',
            'advance_degree' => 'required',
            'speciality' => 'required',
            'work_place' => 'required',
            'username' => 'required|unique:users|min:3',
            'password' => 'required|min:6',
        ]);

        if (!$request->img_path) {
            $file = $request->file('image');
            $name = "";

            if ($file) {
                $name = time() . rand() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads', $name);
            }

            $path = "/uploads/" . $name;
        }

        $user = new User;

        $user->name = $request->full_name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = 2;
        $user->save();

        $doc = new Doctor;
        $doc->nid = $request->nid;
        $doc->full_name = $request->full_name;
        $doc->registration_id = $request->registration_id;
        $doc->email = $request->email;
        $doc->phone = $request->phone;
        $doc->basic_degree = $request->basic_degree;
        $doc->advance_degree = $request->advance_degree;
        $doc->speciality = $request->speciality;
        $doc->work_place = $request->work_place;
        $doc->img_path = $request->img_path ? $request->img_path : $path;
        $doc->user_id = $user->id;
        $doc->save();

        $authDoc = AuthorizeDoctor::where('nid', '=', $request->nid)->first();
        if ($authDoc) {
            $authDoc->status = 1;
            $authDoc->save();
        }

        $message = "Doctor Successfully Added !!!";

        return redirect()->route('doctor.message')->with('message', $message)->with('id', $doc->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doc = Doctor::find($id);

        return view('doctor.show')->with('doc', $doc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $doctor->username = User::find($doctor->user_id)->username;
        return view('doctor.edit')->with('doc', $doctor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    { 
        if(!$request->except('_token', '_method', 'modify')){

            $docMod = DoctorModify::find($request->modify);
            $docMod->status = 1;
            $docMod->save();

            $err = "Doctor ID: $doctor->registration_id's Profile Update Request Rejected";
            return redirect()->route('doctor.message')->with('err', $err);
        }
       
        if(!$request->modify)
        {
            $this->validate($request, [
                'full_name' => 'required',
                'phone' => 'required|numeric|min:11',
                'email' => 'required|email',
                'basic_degree' => 'required',
                'advance_degree' => 'required',
                'speciality' => 'required',
                'work_place' => 'required',
            ]);          
        }else{
            $docMod = DoctorModify::find($request->modify);
            $docMod->status = 1;
            $docMod->save();
        }

        $message = "Doctor Profile has Been Successfully Updated!!!";

        $doc = Doctor::find($doctor->id)->update($request->all());
        
        return redirect()->route('doctor.message')->with('message', $message)->with('id', $doctor->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor = Doctor::find($doctor->id);

        $doctor->status = 1;
        $doctor->save();

        $message = "Doctor ".$doctor->full_name." Successfully Deleted!!!";
        return redirect()->route('doctor.index')->with('message', $message);
    }

    public function passwordChange(Request $request)
    {
        if ($request->missing(['username', 'oldPassword', 'newPassword'])) 
        {
           return "Give Necessary Values";
        }

        if(Auth::attempt(array('username' => $request->username, 'password' => $request->oldPassword)))
        {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->newPassword);
            $user->save();

            return "success";
        }else{
            return "Wrong Credentials";
        }
    }
}
