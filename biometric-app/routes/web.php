<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiometricAuthController;

Route::get('/', function () {
    return view('welcome');

Route::get('/enroll', [BiometricAuthController::class, 'showEnrollmentForm'])->name('biometric.enroll');
Route::post('/register-fingerprint', [BiometricAuthController::class, 'registerFingerprint'])->name('biometric.register');
Route::post('/authenticate-fingerprint', [BiometricAuthController::class, 'authenticateFingerprint'])->name('biometric.authenticate');

});
