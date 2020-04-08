<?php

namespace App\Http\Controllers;

use App\Complain;
use App\Citizen;
use App\Http\Controllers\Controller;
use DB;

class ComplainController extends Controller
{

    public function index()
    {
        $complains = DB::table('complains')->leftjoin('citizens', function($join){
            $join->on('complains.citizen_id','=','citizens.nid'); // i want to join the users table with either of these columns
            $join->orOn('complains.citizen_id','=','citizens.birthCer_id');
        })->get();
            // ->join('citizens', 'complains.citizen_id', '=', 'citizens.nid')
            // ->join('citizens', 'complains.citizen_id', '=', 'citizens.birthCer_id')
            // ->select('complains.*', 'citizens.first_name', 'citizens.last_name', 'citizens.dob')
            // ->get();

        return view('complain.index')->with('complains', $complains);
    }

    public function show(Complain $complain)
    {

        $citizen = Citizen::where('nid', '=', $complain->citizen_id)
            ->orWhere('birthCer_id', '=', $complain->citizen_id)
            ->first();

        return view('complain.show', compact('complain', 'citizen'));
    }

}
