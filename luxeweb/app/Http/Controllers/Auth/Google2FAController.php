<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PragmaRX\Google2FA\Google2FA;
use Illuminate\Support\Facades\Auth;

class Google2FAController extends Controller
{
    public function enable2FA()
    {
        $google2fa = new Google2FA();
        $user = Auth::user();
        
        // Generate secret key
        $secret = $google2fa->generateSecretKey();
        
        // Generate QR code URL
        $qrCodeUrl = $google2fa->getQRCodeUrl(
            config('app.name'),
            $user->email,
            $secret
        );

        // Save secret key
        $user->google2fa_secret = $secret;
        $user->save();

        return view('auth.2fa.enable', compact('qrCodeUrl', 'secret'));
    }

    public function confirm2FA(Request $request)
    {
        $request->validate([
            'code' => 'required|numeric',
        ]);

        $google2fa = new Google2FA();
        $user = Auth::user();
        
        $valid = $google2fa->verifyKey($user->google2fa_secret, $request->code);

        if ($valid) {
            $user->google2fa_enabled = true;
            $user->save();
            // return redirect()->route('dashboard')->with('success', '2FA enabled successfully');
            return response()->json(['state'=>1, 'message'=>'2FA enabled successfully']);
        }

        // return back()->with('error', 'Invalid verification code');
        return response()->json(['state'=>0, 'message'=>'Invalid verification code']);
    }

    public function verify2FA()
    {
        return view('pages.admin.2fa-verify');
    }

    public function verify2FAPost(Request $request)
    {
        $request->validate([
            'code' => 'required|numeric',
        ]);

        $google2fa = new Google2FA();
        $user = Auth::user();
        
        $valid = $google2fa->verifyKey($user->google2fa_secret, $request->code);

        if ($valid) {
            $request->session()->put('2fa_verified', true);
            return redirect()->intended();
        }

        return back()->with('error', 'Invalid verification code');
    }

    public function disable2FA(Request $request)
    {
        $user = Auth::user();
        $user->google2fa_enabled = false;
        $user->google2fa_secret = null;
        $user->save();

        // return redirect()->route('profile')->with('success', '2FA disabled successfully');
        return response()->json(['state'=>1, 'message'=>'2FA disabled successfully']);
    }
}
