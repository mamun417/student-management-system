<?php

namespace App\Http\Controllers\Adminstration;

use App\Teacher;
use App\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class AssignRoleController extends Controller
{
    function __construct()
    {
        $this->middleware('role:admin');
    }

    function edit($id){

        $user = User::find($id);
        $roles = Role::latest()->pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('adminstration.assign_role.edit', compact('user', 'roles', 'userRole'));
    }

    function update(Request $request, $id)
    {
        $this->validate($request, [
            'roles' => 'required'
        ]);

        $user = User::find($id);

        DB::table('model_has_roles')->where('model_id', $user->id)->delete();

        $user->assignRole($request->roles);

        return back()->with('success', 'Role assign successfully');
    }
}
