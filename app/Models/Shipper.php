<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    protected $table = 'shipper';
    protected $primaryKey = 'shipperID';
    protected $fillable = ['shipperID','fullName', 'phNum'];

    // Define the relationship with orders
    public function orders()
    {
        return $this->hasMany(Orders::class, 'shipperID');
    }

    public function payment()
    {
        return $this->hasMany(Payment::class, 'shipperID');
    }
 
}
