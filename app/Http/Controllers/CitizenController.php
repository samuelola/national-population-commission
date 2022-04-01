<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitizenController extends Controller
{
    
    public function __construct(){

        return $this->middleware('auth');
    }

    public function AddCitizen(){

       return view('citizenform'); 
    }

}
