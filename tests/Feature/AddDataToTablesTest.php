<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Organization;
use App\Models\Location;
use App\Models\Device;

class AddDataToTablesTest extends TestCase
{
    // use RefreshDatabase; // Refresh the database before and after the test

    public function testAddDataToTables()
    {
        // Create an organization
        $organization = Organization::create([
            'code' => 'org560',
            'name' => 'Omobio PVT LTD',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create a location associated with the organization
        $location = Location::create([
            'serial_number' => 'loc1989',
            'name' => 'Maga One',
            'ipv4_address' => '192.167.1.100',
            'organization_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create a device associated with the location
        $device = Device::create([
            'type' => 'kiosk',
            'image' => 'device-image.jpg',
            'date_created' => now(),
            'status' => 'active',
            'location_id' => $location->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Assert that the records were created in the database
        $this->assertDatabaseHas('organizations', ['code' => 'org560']);
        $this->assertDatabaseHas('locations', ['serial_number' => 'loc1989']);
        $this->assertDatabaseHas('devices', ['type' => 'kiosk']);
    }
}
