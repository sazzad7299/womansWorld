<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    private $adminObject;

    public function __construct()
    {
        $this->adminObject = new Admin();
    }

    public function index()
    {
        $admins = User::whereHas("roles", function ($q) {
            $q->where("name", "Admin");
        })->latest()->get();
        return view('backend.admin.admins.index', compact('admins'));
    }

    public function create()
    {
        $permissions = Permission::orderBy('name', 'asc')->select('id', 'name')->get();
        return view('backend.admin.admins.create', compact('permissions'));
    }

    public function store(AdminRequest $request)
    {
        $this->adminObject->storeAdmin($request);
        return back();
    }

    public function edit(Admin $admin)
    {
        $permissions = Permission::orderBy('name', 'asc')->select('id', 'name')->get();
        $userPermissions = DB::table('model_has_permissions')->where('model_id', $admin->id)->pluck('permission_id')->toArray();
        return view('backend.admin.admins.edit', compact('admin', 'permissions', 'userPermissions'));
    }

    public function update(AdminRequest $request, Admin $admin)
    {
        $this->adminObject->updateAdmin($request, $admin);
        return redirect()->route('admin.admins.index');
    }

    public function destroy(Admin $admin)
    {
        $this->adminObject->destroyAdmin($admin);
        return back();
    }
}
