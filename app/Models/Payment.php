<?php

// app/Models/Vehicle.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $fillable = ['totalBill'];
    protected $table = 'payment'; // Add this line to specify the table name


    public function shipper()
    {
        return $this->belongsTo(Shipper::class, 'shipperID');
    }

}
