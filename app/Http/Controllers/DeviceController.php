<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Location;
use App\Models\Organization;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'image' => 'required',
            'date_created' => 'required|date',
            'status' => 'required',
            'location_id' => 'required|max_devices'
        ], [
            'max_devices' => 'A location can have 10 no of maximum devices.'
        ]);
        
        // Create the device
        $newDevice = Device::create([
            'type' => $request->type,
            'image' => $request->image,
            'date_created' => $request->date_created,
            'status' => $request->status,
            'location_id' => $request->location_id,
        ]);
        return redirect()->route('organizations.index')->with('success', 'Device created successfully.');
    }

    public function create()
    {
        $locations = Location::all();
        return view('devicesCreate',compact('locations'));
    }
}
