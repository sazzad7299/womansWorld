<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\Rules\Password;

class UserRegisterController extends Controller
{
    public function loginuser(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user != null) {
            if (Hash::check($request->password, $user->password)) {

                // if ($user->email_verified_at == null) {
                //     return response()->json(['message' => 'Please verify your account', 'user' => null], 401);
                // }
                return $this->loginSuccess($user);
            } else {
                return response()->json(['result' => false, 'message' => 'Unauthorized', 'user' => null], 401);
            }
        } else {
            return response()->json(['result' => false, 'message' => 'You have no account using this email', 'user' => null], 401);
        }
    }
    public function createUser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:15', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::where('name', 'User')->first();
        $user->assignRole($role);
        event(new Registered($user));
        return  $this->loginSuccess($user);
    }

    protected function RegSuccess($user)
    {
        return response()->json([
            'result' => true,
            'message' => 'Registration Successful. Please verify and log in to your account.',
            'user_id' => $user->id
        ], 201);
    }
    protected function loginSuccess($user)
    {
        $token = $user->createToken('API Token')->plainTextToken;
        return response()->json([
            'result' => true,
            'message' => 'Successfully logged in',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_at' => null,
            'user' => $user,
        ],201);
    }
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
         return [
            'message'=>'Logged out'
         ];
    }
}
