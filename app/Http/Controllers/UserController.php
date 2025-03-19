<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class UserController extends Controller
{

    public function hasPermission($path)
    {
        // Example: Check if the user has a specific role or permission
        // Replace this with your actual permission logic
        return $this->role === 'admin' || $this->permissions->contains('path', $path);
    }
    public function upload(Request $request)
    {
        //Validate the form data
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'password' => 'required|string|min:6',
        ]);

        //Create a new User model instance and fill it with form data
        $user = new Users([
            'username'->username=$request->username,
            'password'->password=$request->password,
            'email'->email=$request->email,
            'roleID' -> roleID=$request->position,
        ]);

      //  Save the user to the database
        $user->save();

        return redirect()->back()->with('success', 'User created successfully');
    }

    
}
