<?php

namespace App\Http\Controllers;

use App\AllParent;
use App\Http\Requests\Parent\ParentStoreRequest;
use App\Http\Requests\Parent\ParentUpdateRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class ParentController extends Controller
{
    function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $parents = AllParent::with('user')->latest()->get();
        return view('parent.index', compact('parents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('parent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ParentStoreRequest $request
     * @return Response
     */
    public function store(ParentStoreRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $store = $user->parent()->create($request->all());

        $user->assignRole('parent');

        if ($store){
            return redirect(route('parents.index'))->with('success', 'Parent created successfully');
        }
        return redirect(route('parents.index'))->with('warning', 'Parent could not be create');
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
     * @param AllParent $parent
     * @return Response
     */
    public function edit(AllParent $parent)
    {
        return view('parent.edit', compact('parent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ParentUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(ParentUpdateRequest $request, $id)
    {
        $parent = AllParent::find($id);

        $parent->update($request->all());

        $user = [
            'name' => $request->name,
            'email' => $request->email
        ];

        if(!empty($request['password'])){
            $user['password'] = Hash::make($request['password']);
        }

        $update = $parent->user->update($user);

        if ($update){
            return redirect(route('parents.index'))->with('success', 'Parent update successfully');
        }
        return back()->with('warning', 'Parent could not be update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AllParent $parent
     * @return Response
     * @throws \Exception
     */
    public function destroy(AllParent $parent)
    {
        if ($parent->students->count() > 0){
            return back()->with('warning', 'Not allow to delete');
        }

        if ($parent->user->delete()){
            return back()->with('success', 'Parent delete successfully');
        }
        return back()->with('warning', 'Parent could not be delete');
    }
}
