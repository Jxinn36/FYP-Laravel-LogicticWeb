<?php

// app/Http/Controllers/AdvertisementController.php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Advertisement;

class AdvertisementController extends Controller
{
    public function create()
    {
        return view('advertisements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'advName' => 'required',
            'advDesc' => 'required',
            'advImg' => 'required|image|mimes:jpeg,png,jpg,gif',
            'advCompany' => 'required',
            'companyRegisNo' => 'required',
        ]);

        $imageName = time() . '.' . $request->advImg->extension();
        $request->advImg->move(public_path('images/advertisements'), $imageName);

        advertisement::create([
            'advName' => $request->advName,
            'advDesc' => $request->advDesc,
            'advImg' => $imageName,
            'advCompany' => $request->advCompany,
            'companyRegisNo' => $request->companyRegisNo,
        ]);

        return redirect()->route('advertisements.create')->with('success', 'Advertisement added successfully');
    }

    public function index()
    {
        $advertisements=advertisement::all(); 
        return view('homepage', ['show' => $advertisements]); 
      
    }

    public function display()
    {
        $data = advertisement::all(); 
        return view('manageAdvertisement', ['display' => $data]);    
    }

    public function destroy($id)
    {
            // Find the advertisement by ID
            $advertisement = Advertisement::findOrFail($id);
    
            // Delete the advertisement
            $advertisement->delete();
    
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Advertisement deleted successfully.');
    }
}    
