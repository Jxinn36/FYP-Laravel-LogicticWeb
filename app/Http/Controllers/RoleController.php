<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{

    protected $table = 'role'; // Specify the correct table name
    protected $primaryKey = 'roleID'; 
    public function index()
    {
        // Retrieve all roles from the database
        $roles = Role::all();

        return view('role.index', compact('role'));
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'roleName' => 'required|unique:role',
            // Add other validation rules as needed
        ]);

        // Create a new role instance and save it to the database
        Role::create([
            'roleName' => $request->roleName,
            // Add other fields as needed
        ]);

        return redirect(route('roles.index'))->with('success', 'Role created successfully');
    }

    public function edit($id)
    {
        // Find the role by its ID
        $role = Role::findOrFail($id);

        return view('role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'roleName' => 'required|unique:role,position,' . $id,
            // Add other validation rules as needed
        ]);

        // Find the role by its ID and update its attributes
        $role = Role::findOrFail($id);
        $role->update([
            'roleName' => $request->roleName,
            // Add other fields as needed
        ]);

        return redirect(route('role.index'))->with('success', 'Role updated successfully');
    }

    public function destroy($id)
    {
        // Find the role by its ID and delete it
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect(route('role.index'))->with('success', 'Role deleted successfully');
    }
}
