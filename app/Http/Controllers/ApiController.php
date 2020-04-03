<?php

namespace App\Http\Controllers;

use App\Citizen;
use App\Complain;
use App\Doctor;
use App\Http\Resources\CitizenResource;
use App\Http\Resources\DoctorResource;
use App\Http\Resources\MedicineResource;
use App\Http\Resources\PrescriptionResource;
use App\Prescription;
use App\User;
use Auth;
use DateTime;
use DB;
use Exception;
use Hash;
use URL;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    public function medicineList()
    {
        $meds = DB::table('medicines')
            ->join('generics', 'medicines.generic_id', '=', 'generics.id')
            ->select('medicines.*', 'generics.generic_name')
            ->get();

        return new MedicineResource($meds);
    }

    public function medicineInfo($id)
    {
        $meds = DB::table('medicines')
            ->join('generics', 'medicines.generic_id', '=', 'generics.id')
            ->select('medicines.*', 'generics.generic_name')
            ->where('medicines.id', '=', $id)->get();

        return new MedicineResource($meds);
    }

    public function prescriptionInfo($id)
    {
        $prescription = Prescription::find($id);

        $citizen = Citizen::where('nid', '=', $prescription->citizen_id)
            ->orWhere('birthCer_id', '=', $prescription->citizen_id)
            ->select('first_name', 'last_name', 'dob')
            ->first();

        $from = new DateTime($citizen->dob);
        $to = new DateTime('today');
        $citizen->age = $from->diff($to)->y;
        $prescription->date = $prescription->created_at->format('d/m/y');

        $doctor = Doctor::select('full_name', 'email', 'phone', 'work_place', 'speciality', 'basic_degree', 'advance_degree', 'registration_id')
            ->where('id', '=', $prescription->doctor_id)->first();

        $datas = [
            'citizen' => $citizen,
            'doctor' => $doctor,
            'prescription' => $prescription,
        ];

        return new PrescriptionResource($datas);
    }

    public function prescriptionListByCitizen($id)
    {
        $prescription = Prescription::where('citizen_id', '=', $id)
            ->orWhere('birthCer_id', '=', $id)
            ->get();

        if (count($prescription) == 0) {
            return "no data";
        }

        $citizen = Citizen::where('nid', '=', $prescription[0]->citizen_id)
            ->orWhere('birthCer_id', '=', $prescription[0]->citizen_id)
            ->select('first_name', 'last_name', 'dob')
            ->first();

        $from = new DateTime($citizen->dob);
        $to = new DateTime('today');
        $citizen->age = $from->diff($to)->y;

        $datas = [
            'citizen' => $citizen,
            'prescription' => $prescription,
        ];

        return new PrescriptionResource($datas);
    }

    public function prescriptionStore(Request $request)
    {
        if ($request->doctor_id && $request->citizen_id && $request->hospital_name && $request->med_list && $request->disease && $request->date) {
            $presc = new Prescription;

            $presc->doctor_id = $request->doctor_id;
            $presc->citizen_id = $request->citizen_id;
            $presc->hospital_name = $request->hospital_name;
            $presc->mainbody = trim($request->mainbody);
            $presc->med_list = $request->med_list;
            $presc->disease = $request->disease;
            $presc->cc = $request->cc;
            $presc->oe = $request->oe;
            $presc->lx = $request->lx;
            $presc->revisit = $request->revisit;
            $presc->date = new DateTime($request->date);
            try {
                $presc->save();
            } catch (Exception $e) {

                return "fill all the nessesary values";
            }

            return "success";
        }

        return "fill all the nessesary values";
    }

    public function getCitzenInfo($id)
    {
        $citizen = Citizen::where('nid', '=', $id)
            ->orWhere('birthCer_id', '=', $id)
            ->first();

        return new CitizenResource($citizen);
    }

    public function validateDoctor(Request $request)
    {
        if ($request->username && $request->password) {
            if (Auth::attempt(array('username' => $request->username, 'password' => $request->password))) {

                $user = Auth::user();

                //dd($user->id);
                $token = Str::random(60);

                $user->forceFill([
                    'api_token' => Hash::make($token),
                ])->save();

                $doctor = Doctor::where('user_id', '=', $user->id)->first();

                if ($doctor) {

                    $obj = [                    
                        'full_name' => $doctor->full_name,
                        'registration_id' => $doctor->registration_id,
                        'email' => $doctor->email,
                        'phone' => $doctor->phone,
                        'work_place' => $doctor->work_place,
                        'speciality' => $doctor->speciality,
                        'basic_degree' => $doctor->basic_degree,
                        'advance_degree' => $doctor->advance_degree,
                        'img_path' => $doctor->img_path,
                        'full_name' => $doctor->full_name,
                        'full_name' => $doctor->full_name,
                        'api_token' => $token,
                    ];

                    $jsonObj = json_encode($obj);

                    return $jsonObj;
                } else {
                    return "Doctor Not Found";
                }

            } else {
                return "Wrong Credentials";
            }
        }
    }

    public function complainStore(Request $request)
    {
        $com = new Complain;
        $com->complain_type = $request->complain_type;
        $com->complain_body = $request->complain_body;
        $com->citizen_id = $request->citizen_id;

        $com->save();

        return "success";
    }

    public function doctorShow($id)
    {
        $doctor = Doctor::select('registration_id', 'full_name', 'email', 'phone', 'work_place', 'speciality', 'basic_degree', 'advance_degree', 'img_path')
            ->where('registration_id', '=', $id)
            ->first();

            $doctor->img_path = URL::to('/').$doctor->img_path;

        return new DoctorResource($doctor);
    }

}
