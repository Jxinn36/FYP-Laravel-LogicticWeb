<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecureControllerr extends Controller
{
    public function securePage()
    {
        return view('securePage');
    }
}
