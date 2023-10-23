<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Organization;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'serial_number' => 'required|unique:locations',
            'name' => 'required',
            'ipv4_address' => 'required|ipv4',
            'organization_id' => 'required|max_organization_locations'
        ], [
            'max_organization_locations' => 'An organization can have no more than 5 locations.'
        ]);

        $newLocation = Location::create([
            'serial_number' => $request->serial_number,
            'name' => $request->name,
            'ipv4_address' => $request->ipv4_address,
            'organization_id' => $request->organization_id,
        ]);

        return redirect()->route('organizations.index')->with('success', 'Location created successfully.');
    }

    public function create()
    {
        $organizations = Organization::all();
        return view('locationsCreate',compact('organizations'));
    }
}
