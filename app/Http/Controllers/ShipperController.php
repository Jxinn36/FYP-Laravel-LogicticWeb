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

class ShipperController extends Controller
{
    public function upload(Request $request)
    {
         

        // Create a new shipper
        $shipper = Shipper::create([
            'fullName' => $request->pickName,
            'phNum' => $request->pickMobile,
        ]);

        // Create a new order and associate it with the shipper
        $order = new Orders([
            'pickAddress' => $request->pickupAddress,
            'dropAddress' => $request->dropoffAddress,
            'dropName' => $request->dropoffName,
            'dropMobile' => $request->dropoffMobile,
            
        ]);

    // Create a new payment record and associate it with the shipper
    $payment = new payment([
        'totalBill' => $request->totalBill,
    ]);

    $shipper->orders()->save($order);
    $shipper->payment()->save($payment);

    return redirect('/conformation')->with('success', 'Order successfully submitted!');


    return view('confirmation', [
        'selectedVehicleType' => $request->selectedVehicleType,
        'vehicle' => $vehicle,
    ])->with('success', 'Order successfully submitted!');

    }

    public function homeIndex()
    {
        return view('shipper');
    }
    public function index()
    {
        $shipper = shipper::get();

        return view('admin',['data'=>$shipper]);
    }


    public function destroy($id)
    {
            $shipper = Shipper::findOrFail($id);
    
            $shipper->orders()->delete();

            $shipper->delete();

            return redirect()->back()->with('success', 'Shipper deleted successfully.');
        }
    
}










