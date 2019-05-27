<?php

namespace App\Http\Controllers\Adminstration;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $permissions = Permission::latest()->get();
        return view('adminstration.permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('adminstration.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:permissions,name',
        ]);

        Permission::create(['name' => strtolower($request->name)]);

        return redirect()->route('permissions.index')
            ->with('success','Permission created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Permission $permission
     * @return Response
     */
    public function edit(Permission $permission)
    {
        return view('adminstration.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Permission $permission
     * @param Request $request
     * @return void
     * @throws ValidationException
     */
    public function update(Permission $permission, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:permissions,name,'. $permission->id,
        ]);

        $permission->name = strtolower($request->name);
        $permission->save();

        return redirect()->route('permissions.index')
            ->with('success','Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Permission $permission
     * @return Response
     * @throws \Exception
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back()->with('success','Permission deleted successfully');
    }
}
