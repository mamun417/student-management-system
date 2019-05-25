<?php

namespace App\Http\Controllers;

use App\Http\Requests\Teacher\TeacherStoreRequest;
use App\Http\Requests\Teacher\TeacherUpdateRequest;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $teachers = Teacher::with('user')->latest()->get();

        //dd($teachers->toArray());

        return view('teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TeacherStoreRequest $request
     * @return void
     */
    public function store(TeacherStoreRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $store = $user->teacher()->create($request->all());

        if ($store){
            return redirect(route('teachers.index'))->with('success', 'Teacher created successfully');
        }
        return redirect(route('teachers.index'))->with('warning', 'Teacher could not be create');
    }

    /**
     * Display the specified resource.
     *
     * @return void
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Teacher $teacher
     * @return Response
     */
    public function edit(Teacher $teacher)
    {
        return view('teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TeacherUpdateRequest $request
     * @param $id
     * @return void
     */
    public function update(TeacherUpdateRequest $request, $id)
    {
        $teacher = Teacher::find($id);

        $teacher->update($request->all());

        $user = [
            'name' => $request->name,
            'email' => $request->email
        ];

        if(!empty($request['password'])){
            $user['password'] = Hash::make($request['password']);
        }

        $update = $teacher->user->update($user);

        if ($update){
            return redirect(route('teachers.index'))->with('success', 'Teacher update successfully');
        }
        return back()->with('warning', 'Teacher could not be update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Teacher $teacher
     * @return Response
     * @throws \Exception
     */
    public function destroy(Teacher $teacher)
    {
        if ($teacher->user->delete()){
            return back()->with('success', 'Teacher delete successfully');
        }
        return back()->with('warning', 'Teacher could not be delete');
    }
}
