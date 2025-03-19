<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\Carrier;

class CarrierUserProfileController extends Controller
{
  

    function show(){
        $job=orders::all();
        // dd($job);
        return view('carrierJobAcceptance',['orders'=>$job]);
       
    }

}
