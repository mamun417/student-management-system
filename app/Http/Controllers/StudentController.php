<?php

namespace App\Http\Controllers;

use App\AllClass;
use App\AllParent;
use App\Http\Requests\Student\StudentStoreRequest;
use App\Http\Requests\Student\StudentUpdateRequest;
use App\Student;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    function __construct()
    {
        $this->middleware('role:admin')->except('getStudent');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $students = Student::with('user', 'parent', 'class')->latest()->get();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $classes = AllClass::latest()->get();
        $parents = AllParent::latest()->get();
        return view('student.create', compact('classes', 'parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StudentStoreRequest $request
     * @return Response
     */
    public function store(StudentStoreRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $store = $user->student()->create($request->all());

        $user->assignRole('student');

        if ($store){
            return redirect(route('students.index'))->with('success', 'Student created successfully');
        }
        return redirect(route('students.index'))->with('warning', 'Student could not be create');
    }

    /**
     * Display the specified resource.
     *
     * @param Student $student
     * @return Response
     */
    public function show(Student $student)
    {
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Student $student
     * @return void
     */
    public function edit(Student $student)
    {
        $classes = AllClass::latest()->get();
        $parents = AllParent::latest()->get();
        return view('student.edit', compact('student', 'classes', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StudentUpdateRequest $request
     * @param int $id
     * @return void
     */
    public function update(StudentUpdateRequest $request, $id)
    {
        $student = Student::find($id);

        $student->update($request->all());

        $user = [
            'name' => $request->name,
            'email' => $request->email
        ];

        if(!empty($request['password'])){
            $user['password'] = Hash::make($request['password']);
        }

        $update = $student->user->update($user);

        if ($update){
            return redirect(route('students.index'))->with('success', 'Student update successfully');
        }
        return back()->with('warning', 'Student could not be update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Student $student
     * @return Response
     */
    public function destroy(Student $student)
    {
        if ($student->user->delete()){
            return back()->with('success', 'Student delete successfully');
        }
        return back()->with('warning', 'Student could not be delete');
    }

    function getStudent($class_id){
        return Student::with('user')->where('class_id', $class_id)->latest()->get();
    }
}
