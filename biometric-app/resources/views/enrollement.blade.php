<!-- resources/views/biometric/enroll.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Biometric Enrollment</h2>

    <!-- Display success or error message -->
    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @elseif ($errors->any())
        <div class="alert alert-danger">{{ $errors->first('message') }}</div>
    @endif

    <!-- Enrollment Form -->
    <form action="{{ route('biometric.register') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="fingerprint">Register Fingerprint</label>
            <button type="submit" class="btn btn-primary">Enroll Fingerprint</button>
        </div>
    </form>
    
    <!-- Optionally, you can add a way to capture a fingerprint from the biometric device via JavaScript -->
    <!-- The fingerprint scanner will need to interact with the form submission. This will depend on the hardware integration -->
</div>
@endsection
