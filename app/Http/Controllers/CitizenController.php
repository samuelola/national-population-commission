<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class CitizenController extends Controller
{
    
    public function __construct(){

        return $this->middleware('auth');
    }

    public function AddCitizen(){
       
       $states = DB::table('states')
            ->get();
       return view('citizenform',compact('states')); 
    }


    public function getLgas(Request $request){

        $lgas = DB::table('lgas')
            ->where('state_id', $request->state_id)
            ->get();
        
        if (count($lgas) > 0) {
            return response()->json($lgas);
        }
    }


    public function getWards(Request $request){

        $wards = DB::table('wards')
            ->where('lga_id', $request->lga_id)
            ->get();
        
        if (count($wards) > 0) {
            return response()->json($wards);
        }
    }


    public function mycitizen(Request $request){


        $input = $request->all();

        $send = Citizen::create($input);


        return redirect()->back();
    }


}
