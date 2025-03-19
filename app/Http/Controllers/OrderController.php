<?php


// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;


class OrderController extends Controller
{
    
   public function viewJobDetails($orderID){
    $orderDetails = Orders::find($orderID);

//dd($orderID);
  // Validate that $orderID is a positive integer
  if (!ctype_digit($orderID) || $orderID <= 0) {
     abort(404, 'Invalid Order ID');
 }

 // Use findOrFail to automatically handle 404 if the order is not found


    // dd($orderID, $orderDetails);
     return view('carrierViewJob', [
         'orderID' => $orderID,
         'parcelSize' => $orderDetails->parcelSize,
         'pickAddress' => $orderDetails->pickAddress,
         'dropAddress' => $orderDetails->dropAddress,
         'orderTime' => $orderDetails->orderTime,
         'remark' => $orderDetails->remark,
         'dropMobile' => $orderDetails->dropMobile,
         'dropName' => $orderDetails->dropName,
     ]);
 }

 public function edit(string $orderID){
    $orders = Orders::findOrFail($orderID);
    return view ('order.edit', compact('orders'));
 }

 

}
