<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Carbon\Carbon;

use App\Doctor;
use App\User;
use App\Medicine;
use App\Generic;
use App\Prescription;
use App\AuthorizeDoctor;
use App\AuthorizeMedicine;
use DB;
use Input;

class AjaxController extends Controller
{
    public function adminHomeCounts(Request $request)
    {     
        if($request->ajax())
        {
            $doctor = Doctor::all();
            $medicine = Medicine::all();
            $generic = Generic::all();
            $prescription = Prescription::whereDate('created_at', Carbon::today())->get();
            $doctorApp = AuthorizeDoctor::where('status', '=', '1')->get();
            $medicineApp = AuthorizeMedicine::where('status', '=', '0')->get();

            $result = [
                count($doctor),
                count($medicine),
                count($generic),
                count($prescription),
                count($doctorApp),
                count($medicineApp),
            ];
            
            return $result;
        }
    }
    
    public function getDoctorDetails(Request $request, $id)
    {    
        if($request->ajax())
        {
            $doctor = Doctor::select('registration_id', 'full_name', 'email', 'phone', 'speciality', 'work_place', 'img_path','basic_degree', 'advance_degree')->where('registration_id', $id)->get();

            return $doctor;
        }
    }

    public function getMedList(Request $request, $query)
    {    
        if($request->ajax())
        {         
            $meds = DB::table('medicines')
            ->join('generics', 'medicines.generic_id', '=', 'generics.id')
            ->select('medicines.*', 'generics.generic_name')
            ->where('medicines.brand_name', 'LIKE', "{$query}%")
            ->get();
            return $meds;
        }
    }

    public function getGenericList(Request $request, $query)
    {    
        if($request->ajax())
        {
            $genrics = Generic::query()->where('generic_name', 'LIKE', "{$query}%")->get();
            return $genrics;
        }
    }

    public function getNotification(Request $request)
    {    
        if($request->ajax() or true)
        {
            return User::getNotification();
        }
    }

    public function generateDoctorID(Request $request)
    {    

        if($request->ajax())
        {
            $maxID = Doctor::max('id');

            $maxID = $maxID ? $maxID + 1 : 1;

            $maxID = str_pad($maxID, 6, '0', STR_PAD_LEFT);

            $time = Carbon::now();

            $year = substr($time->year, -2);
            
            $month = $time->month <= 9 ? '0'.$time->month : $time->month;
            
            $day = $time->day <= 9 ? '0'.$time->day : $time->day;
            
            $id = $year.$month.$day.$maxID;

            return $id;
        }
    }

    public function getInternationalNews(Request $request)
    {    
        if($request->ajax() or true)
        {
            $client = new \GuzzleHttp\Client();
            ini_set("allow_url_fopen", 1);

            $url = "http://newsapi.org/v2/top-headlines?country=us&category=health&apiKey=4a65c4784df9452cadac8fade0dfe74a";
            
            $res = $client->request('GET',$url);
                        
            $json = json_decode($res->getBody());

            $status = $json->status;
            $articles = $json->articles;
       
            if($status == "ok")
            {
                return $articles;
            }
            
            return "null";
        }
    }
}