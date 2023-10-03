<?php

namespace App\Http\Controllers\Api\V1;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\V1\UserRegisterController;

class EmailVerificationController extends Controller
{
    public function verifyemail($id,$hash)
    {
        $user = User::query()->where('id',$id)->first();

        if($user){
            if (hash_equals($hash, sha1($user->email))) {

                if($user->email_verified_at == null){
                    User::where('id',$id)->update(['email_verified_at'=>now()]);

                     $token = $user->createToken('API Token')->plainTextToken;
                        return response()->json([
                            'result' => true,
                            'message' => 'Email Verified Successfully',
                            'access_token' => $token,
                            'token_type' => 'Bearer',
                            'expires_at' => null,
                            'user' => $user,
                        ],201);
                }else{
                    return response()->json([
                        'message'=>"Already Verified",
                    ],303);
                }
            } else {
             return response()->json([
                    'message'=>"Email not Verified,try again",
                ],404);
            }
        }else{
            return response()->json([
                'message'=>"Account Not Found",
            ],404);
        }


    }
}
