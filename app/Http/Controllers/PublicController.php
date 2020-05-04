<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Login;

class PublicController extends Controller
{
    public function findRegisteredDoctor()
    {
        return view('public.findRegisteredDoctor');
    }

    public function signup()
    {
        $data = Login::all();
        return view('public.signup')->with("data", $data);
    }

    public function downloadSoftware()
    {
        return response()->download(storage_path("app/public/software.zip"));
    }

}
