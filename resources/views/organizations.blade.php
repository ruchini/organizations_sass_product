<!DOCTYPE html>
<html>
<head>
    <title>Organizations</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Organizations List</h1>
        <div class="button-container">
            <a href="{{ route('organizations.create') }}" class="btn btn-primary">Organization</a>
            <a href="{{ route('locations.create') }}" class="btn btn-primary">Location</a>
            <a href="{{ route('devices.create') }}" class="btn btn-primary">Device</a>
        </div>
        <ul class="organization-list">
            @foreach ($organizations as $organization)
                <li class="organization">
                    <div class="organization-name">{{ $organization->name }}</div>

                    <!-- Locations for the current organization -->
                    <ul class="location-list">
                        @foreach ($organization->locations as $location)
                            <li class="location">
                                <div class="location-header">
                                    <button class="toggle-devices" style="cursor: pointer;">
                                        <i class="fas fa-chevron-down"></i>
                                        <span class="location-name">{{ $location->name }}</span>
                                    </button>
                                </div>

                                <!-- Devices for the current location (initially hidden) -->
                                <ul class="device-list hidden">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th></th>
                                                <th>Status</th>
                                                <th></th>
                                                <th>Created</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($location->devices as $device)
                                                <tr>
                                                    <td>{{ $device->type }}</td>
                                                    <td></td>
                                                    <td>{{ $device->status }}</td>
                                                    <td></td>
                                                    <td>{{ $device->date_created }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </ul>



                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>

    <script>
        $(document).ready(function() {
            $('.toggle-devices').click(function() {
                var deviceList = $(this).parent().next('.device-list');
                deviceList.toggleClass('hidden');
            });
        });
    </script>
</body>
</html>
