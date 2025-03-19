<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   public function index(){

    if(Auth::id()){
        $role = Auth::users()->roleID;

        if($role == "1"){
            return view("shipper");
    }else if ($role == "2"){
        return view("homepage");
   }
}
}
}
