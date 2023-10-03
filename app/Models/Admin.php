<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class Admin extends Model
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

    public function storeAdmin(Object $request)
    {
        $image = $request->file('photo');

        if ($image) {

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/admins/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $this->photo     = $image_url;
        }

        $this->name      = $request->name;
        $this->email     = $request->email;
        $this->phone     = $request->phone;
        $this->address   = $request->address;
        $this->password  = Hash::make($request->password);
        $adminStore      = $this->save();

        $admin = User::findOrFail($this->id);
        $role = Role::where('name', 'Admin')->first();
        $admin->assignRole($role);
        $admin->syncPermissions($request->permission_id);

        $adminStore
            ? session()->flash('success', 'New Admin Created Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function updateAdmin(Object $request, Object $admin)
    {
        $image = $request->file('photo');
        if ($image) {

            if (file_exists($admin->photo)) unlink($admin->photo);

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/admins/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $admin->photo     = $image_url;
        }

        $admin->name      = $request->name;
        $admin->email     = $request->email;
        $admin->phone     = $request->phone;
        $admin->address   = $request->address;
        $adminUpdate      = $admin->save();
        $user = User::findOrFail($admin->id);
        $user->syncPermissions($request->permission_id);

        $adminUpdate
            ? session()->flash('success', 'Admin Updated Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function destroyAdmin(Object $admin)
    {
        if (file_exists($admin->photo)) unlink($admin->photo);
        $user = User::findOrFail($admin->id);
        $user->removeRole($user->roles->first());
        $user->syncPermissions();
        $adminDelete = $admin->delete();

        $adminDelete
            ? session()->flash('success', 'Admin Deleted Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }
}
