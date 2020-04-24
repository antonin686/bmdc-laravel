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
        $file = public_path(). "/downloads/softwares/software.zip";

        $headers = [
            'Content-Type' => 'application/zip',
        ];

        return response()->download($file, 'filename.zip', $headers);
    }

}
