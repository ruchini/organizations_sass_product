<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/create.css') }}">
    <title>Add Organization</title>
</head>
<body>
    <div class="container">
        <h1>Create Organization</h1>
        <form method="POST" action="{{ route('organizations.store') }}">
            @csrf

            <div class="form-group">
                <label for="code">Organization Code</label>
                <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" required placeholder="E.g. org123" >
                @error('code')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Organization Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
        <a href="{{ route('organizations.index') }}" class="btn btn-secondary">Back to Home</a>
    </div>
</body>
</html>
