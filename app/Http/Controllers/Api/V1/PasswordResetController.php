<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PasswordResetController extends Controller
{
    public function forgetRequest(Request $request)
    {
        if ($request->send_code_by == 'email') {
            $user = User::where('email', $request->email_or_phone)->first();
        } else {
            $user = User::where('phone', $request->email_or_phone)->first();
        }


        if (!$user) {
            return response()->json([
                'result' => false,
                'message' => 'User is not found'], 404);
        }

        if ($user) {
            // $user->verification_code = rand(100000, 999999);
            // $user->save();
            // if ($request->send_code_by == 'phone') {

            //     $otpController = new OTPVerificationController();
            //     $otpController->send_code($user);
            // } else {
            //     $user->notify(new AppEmailVerificationNotification());
            // }
            return response()->json($user,200);
        }

        return response()->json([
            'result' => true,
            'message' => translate('A code is sent')
        ], 200);
    }
}
