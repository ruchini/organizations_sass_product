<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/create.css') }}">
    <title>Add Device</title>
</head>
<body>
    <div class="container">
        <h1>Add Device</h1>
        <form method="POST" action="{{ route('devices.store') }}">
            @csrf

            <div class="form-group">
                <label for="type">Device Type</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="pos">POS</option>
                    <option value="kiosk">Kiosk</option>
                    <option value="digital_signage">Digital Signage</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Device Image (PNG or JPG)</label>
                <input type="file" name="image" id="image" class="form-control" required accept=".png, .jpg">
            </div>

            <div class="form-group">
                <label for="date_created">Date Created</label>
                <input type="date" name="date_created" id="date_created" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <div class="form-group">
                <label for="location_id">Location</label>
                <select name="location_id" id="location_id" class="form-control">
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>
            </div>

            @error('type')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @error('date_created')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @error('location_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Add Device</button>
        </form>
        <a href="{{ route('organizations.index') }}" class="btn btn-secondary">Back to Home</a>
    </div>
</body>
</html>
