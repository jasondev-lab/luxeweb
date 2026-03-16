<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use DB; 
use Carbon\Carbon; 
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Setting;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
        ]);

        $setting_email=Setting::where('meta_key', 'email')->first();
        $sender_email=$setting_email['meta_value']['address'];

        Mail::send('pages.front.email-forget-password', ['token' => $token], function($message) use($request, $sender_email){
            $message->to($request->email);
            $message->subject('Reset Password');
            $message->from( $sender_email, 'Facets');
        });

        return response()->json(['state'=>1, 'message'=>'We have e-mailed your password reset link!']);
    }
}
