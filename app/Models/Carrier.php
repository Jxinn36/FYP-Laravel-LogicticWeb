<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Carrier extends Model{
    use HasFactory; 

    protected $table = 'carrier';
    protected $primaryKey = 'carrierID';
    protected $fillable = ['carrier','orderID', 'userID','created_at'];

    public function order()
    {
        return $this->belongsTo(Orders::class, 'orderID', 'orderID' );
    }

//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }

}
