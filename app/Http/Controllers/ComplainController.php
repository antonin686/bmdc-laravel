<?php

namespace App\Http\Controllers;

use App\Complain;
use App\Citizen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ComplainController extends Controller
{

    public function index()
    {
        $complains = DB::table('complains')->leftjoin('citizens', function($join){
            $join->on('complains.citizen_id','=','citizens.nid');
            $join->orOn('complains.citizen_id','=','citizens.birthCer_id');
        })->select('complains.*', 'citizens.first_name', 'citizens.last_name')->get();

        foreach($complains as $complain)
        {
            if ($complain->status == 0) { $complain->status = 'Received';}
            else if ($complain->status == 1) { $complain->status = 'Accepted';}
            else if ($complain->status == 2) { $complain->status = 'Rejected';}
        }

        return view('complain.index')->with('complains', $complains);
    }

    public function update(Request $request, $id)
    {
        $complain = Complain::find($id);
        $complain->remark = $request->remark;

        if($request->submit_type == 'accept')
        {
            $complain->status = 1;  
            $message = 'Complain Has Been Accepted';
         
        }else if($request->submit_type == 'reject')
        {
            $complain->status = 2;
            $message = 'Complain Has Been Rejected';
        }

        $complain->save();
        

        return redirect()->route('complain.index')->with('message', $message);
    }

    public function destroy(Request $request, $id)
    {
        
        $complain = Complain::find($id);
        $complain->status = 2;
        $complain->save();

        $message = 'Complain Has Been Rejected';

        return redirect()->route('complain.index')->with('redMessage', $message);
    }

    public function show(Complain $complain)
    {
    
        $citizen = Citizen::where('nid', '=', $complain->citizen_id)
            ->orWhere('birthCer_id', '=', $complain->citizen_id)
            ->first();

        return view('complain.show', compact('complain', 'citizen'));
    }

}