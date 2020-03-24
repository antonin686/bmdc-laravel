<?php

namespace App\Http\Controllers;

use App\AuthorizeDoctor;
use App\Doctor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        $user->name = $request->first_name . ' ' . $request->last_name;
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
        $this->validate($request, [
            'full_name' => 'required',
            'phone' => 'required|numeric|min:11',
            'email' => 'required|email',
            'basic_degree' => 'required',
            'advance_degree' => 'required',
            'speciality' => 'required',
            'work_place' => 'required',
        ]);

        $doc = Doctor::find($doctor->id);
        $doc->full_name = $request->full_name;
        $doc->email = $request->email;
        $doc->phone = $request->phone;
        $doc->basic_degree = $request->basic_degree;
        $doc->advance_degree = $request->advance_degree;
        $doc->speciality = $request->speciality;
        $doc->work_place = $request->work_place;
        $doc->save();

        $message = "Doctor has Been Successfully Updated!!!";

        return redirect()->route('doctor.message')->with('message', $message)->with('id', $doc->id);
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
}
