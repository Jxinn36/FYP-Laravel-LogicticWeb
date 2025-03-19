<?php

// app/Models/Vehicle.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
 
    protected $fillable = ['type','noPlate'];
    protected $table = 'vehicle'; // Add this line to specify the table name

    public function shipper()
{
    return $this->belongsTo(Shipper::class);
}

}
