<?php

//app/Http/Controllers/BiometricAuthController.php

use App\Models\User;
use Illuminate\Http\Request;
use XpertCoder\Fingerprint\FingerprintScanner;

class BiometricAuthController extends Controller
{
    public function showEnrollmentForm()
    {
        return view('biometric.enroll'); // Return the enrollment Blade view
    }

    public function registerFingerprint(Request $request)
    {
        $scanner = new FingerprintScanner();

        // Simulating fingerprint scan and getting the fingerprint data
        $fingerprintData = $scanner->scan();

        // Store fingerprint data in the user's record
        $user = auth()->user();
        $user->fingerprint_data = $fingerprintData;
        $user->save();

        return redirect()->route('biometric.enroll')->with('message', 'Fingerprint enrolled successfully');
    }

    public function authenticateFingerprint(Request $request)
    {
        $scanner = new FingerprintScanner();

        // Simulate scanning the fingerprint and getting the fingerprint data
        $fingerprintData = $scanner->scan();

        // Check if the fingerprint matches the user's stored fingerprint data
        $user = User::where('fingerprint_data', $fingerprintData)->first();

        if ($user) {
            auth()->login($user);
            return redirect()->route('dashboard'); // Redirect to the dashboard after successful authentication
        } else {
            return back()->withErrors(['message' => 'Authentication failed. Please try again.']);
        }
    }
}

