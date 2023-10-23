<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{

    public function index()
    {
        // $organizations = Organization::all();
        $organizations = Organization::orderBy('name', 'asc')->get();
        return view('organizations', compact('organizations'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:organizations', // Ensure code is required and unique
            'name' => 'required',
        ]);

        // Check if a record with the same code already exists
        $existingOrganization = Organization::where('code', $request->input('code'))->first();
        if ($existingOrganization) {
            return redirect()->route('organizations.create')->with('error', 'An organization with the same code already exists.');
        }

        // Create a new organization with the validated data
        Organization::create([
            'code' => $request->input('code'),
            'name' => $request->input('name'),
        ]);

        return redirect()->route('organizations.index')->with('success', 'Organization created successfully');
    }

    public function create()
    {
        return view('organizationsCreate');
    }

}
