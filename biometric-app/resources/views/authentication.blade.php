<!-- resources/views/biometric/authenticate.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Biometric Authentication</h2>

    <!-- Display success or error message -->
    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @elseif ($errors->any())
        <div class="alert alert-danger">{{ $errors->first('message') }}</div>
    @endif

    <!-- Authentication Form -->
    <form action="{{ route('biometric.authenticate') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="fingerprint">Authenticate Fingerprint</label>
            <button type="submit" class="btn btn-primary">Authenticate</button>
        </div>
    </form>
</div>
@endsection
