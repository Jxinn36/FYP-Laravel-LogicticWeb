<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    // use HasFactory;
    protected $primaryKey = 'roleID'; // Assuming 'roleID' is the primary key in the roles table
    protected $table ="role";
    // Define the relationship with the User model
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
