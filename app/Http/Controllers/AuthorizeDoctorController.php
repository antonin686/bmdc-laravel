<?php

namespace App\Http\Controllers;

use App\AuthorizeDoctor;
use Illuminate\Http\Request;

class AuthorizeDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apps = AuthorizeDoctor::where('status', '=', '0')->get();
        return view('application.doctor.index')->with('apps', $apps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('application.doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $doc->first_name = $request->first_name;
        $doc->last_name = $request->last_name;
        $doc->email = $request->email;
        $doc->degree = $request->degree;
        $doc->speciality = $request->speciality;
        $doc->institute = $request->institute;
        $doc->img_path = $path;
        $doc->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AuthorizeDoctor  $authorizeDoctor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $app = AuthorizeDoctor::find($id);

        return view('application.doctor.show')->with('app', $app);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AuthorizeDoctor  $authorizeDoctor
     * @return \Illuminate\Http\Response
     */
    public function edit(AuthorizeDoctor $authorizeDoctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AuthorizeDoctor  $authorizeDoctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuthorizeDoctor $authorizeDoctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AuthorizeDoctor  $authorizeDoctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuthorizeDoctor $authorizeDoctor)
    {
        //
    }
}
