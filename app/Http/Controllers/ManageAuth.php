<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\FilesController;
use App\Models\Role;
use Session;



class ManageAuth extends Controller
{
    
    //login
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect('/');
        }

        // Authentication failed
        return redirect()->route('login')->withErrors(['email' => 'Invalid credentials']);
    }

    public function postLogin(Request $request){
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);

        $credentials  = $request->only('email','password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
    
            // Retrieve the authenticated user
            $user = Auth::user();

            session(['user' => $user]);

            // Check the roleName and redirect accordingly
            switch ($user->role->roleID) {
                case '1':
                    return redirect('/carrier');
                case '3':
                    return redirect('/admin');
                case '2':
                    return redirect('/');
                // Add more cases as needed
                default:
                    return redirect('/');
            }
        }
    
        return redirect(route('login'))->with("error", "Email or Password are not valid!");
    }


  //  dd(Auth::guard()->attempt($credentials));

    



   //register
    public function registration(){

    $roles = Role::all();
    return view('auth.register',['role' => $roles]);
    }

   

    public function registrationPost(Request $request){
     
        $role = Role::where('roleName', 'Shipper')->first();
        if ($role) {
            $user = new User;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make ($request->password);
            $user->roleID = $role->roleID;
            $user->save();
           
        }
        if (!$user) {
            // Handle the case where user creation fails
            return redirect(route('register'))->with("error", "Registration failed, please try again!");
        }
    
        // Redirect to login page with success message
        return redirect(route('login'))->with("success", "Registration success!");


}
public function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route("login"));
    }


}
