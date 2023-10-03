<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 'photo',
    ];

    protected $hidden = [

        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $validatePasswordRule = [

        'old_password' => 'required|string',
        'password'    => 'required|string|min:8|confirmed',
    ];

    public static $validatePhotoRule = [

        'photo' => 'mimes:jpeg,jpg,png,gif,webp|required|max:1000',
    ];

    public function updateUserPhoto($request)
    {
        $user  = $this::findOrFail(auth()->id());
        if (file_exists($user->photo)) unlink($user->photo);
        $image = $request->file('photo');
        $image_name      = date('YmdHis');
        $ext             = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name . '.' . $ext;
        $upload_path     = 'public/images/users/';
        $image_url       = $upload_path . $image_full_name;
        $success         = $image->move($upload_path, $image_full_name);
        $user->photo     = $image_url;
        $userUpdate      = $user->save();
        return $userUpdate;

    }

    public function updateUserPassword($request)
    {
        $user = $this::findOrFail(auth()->id());

        if (Hash::check($request->old_password, $user->password)) {
            $userUpdate =$user->fill([

                'password' => Hash::make($request->password)

            ])->save();
            return $userUpdate;

        }
    }

    public function updateUserInfo($request,$id)
    {
        $user  = $this::findOrFail($id);
        $userUpdate      = $user->update($request->all());
        return $userUpdate;
    }
}
