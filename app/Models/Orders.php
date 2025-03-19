<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'orderID';
    protected $fillable = [ 'orderID',
                            'shipperID',
                            'pickAddress',
                            'dropAddress', 
                            'remark',
                            'vehicleID',
                            'amount',
                            'deliveryStatus',
                            'created_at',
                            'updated_at',   
                            'deleted',
                            'dropMobile',
                            'dropName',
                            'midstop1', 
                            'midstop2',
                            'midstop3'];

    public function order()
    {
        return $this->belongsTo(Orders::class, 'orderID');
    }                      

    // Define the relationship with shippers
    public function shipper()
    {
        return $this->belongsTo(Shipper::class, 'shipperID');
    }
    // Rest of your model code..
    
    public function vehicle()
{
    return $this->belongsTo(Vehicle::class, 'vehicleID');
}

public function user()
{
    return $this->belongsTo(User::class, 'userID');
}

}
