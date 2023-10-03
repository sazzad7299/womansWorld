<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    private $profileObject;

    public function __construct()
    {
        $this->profileObject = new Profile();
    }

    public function photo(Request $request,Profile $profile)
    {
        $request->validate(Profile::$validatePhotoRule);
       $updateprofile = $profile->updateUserPhoto($request);
       $updateprofile
            ? session()->flash('success', 'Profile Photo Updated Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
        return back();
    }

    public function password(Request $request,Profile $profile)
    {
        $request->validate(Profile::$validatePasswordRule);
        $update = $profile->updateUserPassword($request);
        $update
            ? session()->flash('success', 'Password Updated Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
        return back();
    }

    public function info(ProfileRequest $request,Profile $profile)
    {

        $user_id = Auth::user()->id;
        $userUpdate =$profile->updateUserInfo($request,$user_id);
        $userUpdate
            ? session()->flash('success', 'User Info Updated Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
        return back();
    }
}
