<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Carrier;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use function Symfony\Component\String\s;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CarrierController extends Controller
{
    public function acceptJob(Request $request)
    {
        try {
            $order = Orders::find($request->orderID);

            $abc = [
                'carrierID' => hexdec(substr(sha1(uniqid()), 0, 8)),
                "orderID" => $order->orderID,
                "userID" => session('user')->userID,
            ];

            if ($order) {
                $carrierData = Carrier::create($abc);
            }

            $order->deliveryStatus = 'pending';
            $order->save();

            return redirect()->back()->with('success', 'Job accepted successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error accepting job. Please try again later.');
        }
    }

    function show()
    {
        if (session('user')) {
            $data = Orders::whereNull('deliveryStatus')->get();
            return view('carrier', ['orders' => $data]);
        } else {
            return redirect('/login');
        }
    }
    function index()
    {
        $data = orders::all();
        return view('carrierDashboard', ['orders' => $data]);
    }

    function showJob()
    {
        $job = Carrier::where('userID', session('user')->userID)->with('order')->get();
        return view('carrierJobAcceptance', ['orders' => $job]);
    }

    function updateStatus(Request $request)
    {
        $orderId = $request->input('order_id');
        $newStatus = $request->input('status');

        $order = Orders::where('orderID', $orderId)->first();

        if ($order) {
            $order->deliveryStatus = $newStatus;
            $order->save();

            // Redirect back or to a specific route after update
            return redirect()->back()->with('success', 'Order status updated successfully.');
        }

        return redirect()->back()->with('error', 'Failed to update order status.');
    }

    public function showUserProfile()
    {
        $user = session('user');
        return view('carrierUserProfile', ['user' => $user]);

    }

   
}
class CarrierControllerTest extends TestCase
{
    use RefreshDatabase;
    public function testAcceptJob()
    {
        $order = factory(Orders::class)->create();
        $user = factory(User::class)->create();
        $this->actingAs($user); // Simulate a logged-in user in the session

        // Create a fake request with the necessary input data to test 
        $request = new Request([
            'orderID' => $order->orderID,
        ]);

        $controller = new CarrierController();
       
        $response = $controller->acceptJob($request);
        
        $this->assertDatabaseHas('carriers', [
            'orderID' => $order->orderID,
        ]);

        $this->assertEquals('pending', $order->fresh()->deliveryStatus);

        $response->assertRedirect();
        $this->assertContains('Job accepted successfully!', session('success'));
    }

    public function testUpdateStatus()
    {
        // Arrange
        $order = factory(Orders::class)->create();
        $newStatus = 'deliver';

        // Create a fake request with the necessary input data
        $request = new Request([
            'orderID' => $order->orderID,
            'deliveryStatus' => $newStatus,
        ]);

        // Create an instance of the controller
        $controller = new OrderController();

        // Act
        $response = $controller->updateStatus($request);

        // Assert
        $this->assertDatabaseHas('orders', [
            'orderID' => $order->orderID,
            'deliveryStatus' => $newStatus,
        ]);

        $response->assertRedirect();
        $this->assertContains('Order status updated successfully.', session('success'));
    }
}
