<?php

// app/Http/Controllers/VehicleController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Shipper;
use App\Models\Orders;


class VehicleController extends Controller
{
    
    public function fetchVehicleDetails(Request $request)
    {
        // You need to replace this with your actual logic to fetch vehicle details from the database
        $vehicleType = $request->input('vehicleType');
        $vehicleDetails = vehicle::where('type', $vehicleType)->first();
    
        return response()->json([
            'type' => $vehicleDetails->type,
            'noPlate' => $vehicleDetails->noPlate,
        ]);
    }

    // app/Http/Controllers/BookingController.php

    public function conformation(Request $request): View
    {
        $foundVehicleType = $request->input('foundVehicleType');
        $foundVehicleNumberPlate = $request->input('foundVehicleNumberPlate');
    
        return view('conformation', [
            'foundVehicleType' => $foundVehicleType,
            'foundVehicleNumberPlate' => $foundVehicleNumberPlate,
        ]);


}




}











