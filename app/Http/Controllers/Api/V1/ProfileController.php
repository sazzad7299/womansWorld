<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\UserShipping;

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
       $update = $profile->updateUserPhoto($request);
        if($update){
            return response()->json(["message" =>"Profile Image Updated Successfully"],200);
        }else{
            return response()->json(["message" =>"Something went wrong,Try again"],300);
        }
    }

    public function password(Request $request,Profile $profile)
    {
        $request->validate(Profile::$validatePasswordRule);
        $update = $profile->updateUserPassword($request);
        if($update){
            return response()->json(["message" =>"Password Updated Successfully"],200);
        }else{
            return response()->json(["message" =>"Something went wrong,Try again"],300);
        }
    }
    public function info(ProfileRequest $request,Profile $profile)
    {

        $user_id = auth('sanctum')->user()->id;
        $userUpdate =$profile->updateUserInfo($request,$user_id);
        if($userUpdate){
            return response()->json(["message" =>"User-info Updated Successfully"],200);
        }else{
            return response()->json(["message" =>"Something went wrong,Try again"]);
        }
    }
    public function shippinginfo(Request $request)
    {
        $shippingdata = $request->all();
        $shippingdata['user_id']=auth('sanctum')->user()->id;
        // return $shippingdata;
        $shipping = UserShipping::insertOrUpdate($shippingdata);
        if($shipping){
            return response()->json(["message" =>"Shipping-info Updated Successfully"],200);
        }else{
            return response()->json(["message" =>"Something went wrong,Try again"]);
        }
    }
}
