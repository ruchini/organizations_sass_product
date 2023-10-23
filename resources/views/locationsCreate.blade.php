<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/create.css') }}">
    <title>Create Location</title>
</head>
<body>
    <div class="container">
        <h1>Create Location</h1>
        <form method="POST" action="{{ route('locations.store') }}">
            @csrf

            <div class="form-group">
                <label for="serial_number">Serial Number</label>
                <input type="text" name="serial_number" id="serial_number" class="form-control" required placeholder="E.g. loc123">
                @if ($errors->has('serial_number'))
                    <div class="alert alert-danger">{{ $errors->first('serial_number') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="name">Location Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
                @error('name')
                    <div class="alert alert-danger">{{ $error }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="ipv4_address">IPv4 Address</label>
                <input type="text" name="ipv4_address" id="ipv4_address" class="form-control" required placeholder="E.g. 192.168.1.1">
                @error('ipv4_address')
                    <div class="alert alert-danger">{{ $error }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="organization_id">Organization</label>
                <select name="organization_id" id="organization_id" class="form-control">
                    @foreach($organizations as $org)
                        <option value="{{ $org->id }}">{{ $org->name }}</option>
                    @endforeach
                </select>
                @error('organization_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            @if ($errors->has('error'))
                <div class="alert alert-danger">{{ $errors->first('error') }}</div>
            @endif

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
        <a href="{{ route('organizations.index') }}" class="btn btn-secondary">Back to Home</a>
    </div>
</body>
</html>
