<?php

// app/Http/Controllers/AdvertisementController.php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Advertisement;


class newAdverController extends Controller{
// another advertisment controller

public function show()
    {
        $advertisements = advertisement::get(); // Change variable name to $advertisements
        
        return view('manageAdvertisement', ['data' => $advertisements]); // Change variable name to $advertisements
    }




}