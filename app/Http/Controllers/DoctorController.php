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
        $this->validate($request,[
            'first_name' => 'required',
            'nid' => 'required|unique:doctors',
            'last_name' => 'required',
            'phone' => 'required|numeric|min:11',
            'email' => 'required|email',
            'degree' => 'required',
            'institute' => 'required',
            'username' => 'required|unique:users|min:3',
            'password' => 'required|min:6',
        ]);
        
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
        $doc->phone = $request->phone;
        $doc->speciality = $request->speciality;
        $doc->degree = $request->degree;
        $doc->institute = $request->institute;
        $doc->img_path = $request->img_path;
        $doc->user_id = $user->id;
        $doc->save();  

        $authDoc = AuthorizeDoctor::where('nid', '=', $request->nid)->first();
        if($authDoc)
        {
            $authDoc->status = 1;
            $authDoc->save();
        }
        
        
        return redirect()->route('doctor.index')->with('message',$message);
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
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|numeric|min:11',
            'email' => 'required|email',
            'degree' => 'required',
            'institute' => 'required',
        ]);
        
        $doc = Doctor::find($doctor->id);
        $doc->first_name = $request->first_name;
        $doc->last_name = $request->last_name;
        $doc->speciality = $request->speciality;
        $doc->degree = $request->degree;
        $doc->email = $request->email;
        $doc->phone = $request->phone;
        $doc->institute = $request->institute;
        $doc->save();

        $message = "Doctor has Been Successfully Updated!!!";

        return redirect()->route('doctor.edit', $doc->id)->with('message', $message);
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