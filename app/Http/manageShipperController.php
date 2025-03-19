<?php

namespace App\Http\Controllers; 
use App\Models\Shipper;
use App\Models\Orders;
use App\Models\Vehicle;
use App\Models\Payment;
 use Illuminate\Http\Request;
// use App\Models\Shipper; // Make sure to import the Shipper model
// use App\Models\Orders; 
 use Illuminate\Support\Facades\DB;

class manageShipperController extends Controller
{

    function show(){
        $data=shipper::all();
        return view('manageShipper',['shipper'=>$data]);
    }
}