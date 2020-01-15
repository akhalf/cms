<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function store(Request $request)
    {
        $this->role->find($request->role_id)->permissions()->sync($request->permission);
        return back()->with(['success' => 'تم تحديث البيانات']);
    }

    public function getByRole(Request $request)
    {
        $permissions = $this->role->find($request->id)->permissions()->pluck('permission_id');

        return $permissions;
    }
}
