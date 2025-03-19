<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;

use App\Models\Shipper; 

class manageShipperController extends Controller
{
    public function index()
    {
        $shipper = shipper::get();

        return view('admin',['data'=>$shipper]);
    }

}
