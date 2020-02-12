<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\User;
use App\AuthorizeDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docs = Doctor::all();
        return view('doctor.index')->with('docs', $docs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        $user->name = $request->first_name.' '.$request->last_name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = 2;
        $user->save();

        $doc = new Doctor;
        $doc->nid = $request->nid;
        $doc->first_name = $request->first_name;
        $doc->last_name = $request->last_name;
        $doc->email = $request->email;
        $doc->speciality = $request->speciality;
        $doc->degree = $request->degree;
        $doc->user_id = $user->id;
        $doc->save();  

        $authDoc = new AuthorizeDoctor;
        
        return redirect()->route('doctor.index');
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

        return view ('doctor.show')->with('doc', $doc);
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
        $doc = Doctor::find($doctor->id);
        $doc->first_name = $request->first_name;
        $doc->last_name = $request->last_name;
        $doc->speciality = $request->speciality;
        $doc->degree = $request->degree;
        $doc->email = $request->email;
        $doc->save();

        return redirect()->route('doctor.show', $doc->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
