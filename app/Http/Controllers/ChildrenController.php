<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ChildrenController extends Controller
{
    function __construct()
    {
        $this->middleware('role:parent');
    }

    public function index()
    {
        if (Auth()->user()->parent){
            $students = Student::with('user', 'parent', 'class')->where('parent_id', Auth()->user()->parent->id)->latest()->get();
        }else{
            $students = [];
        }

        return view('children.index', compact('students'));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('children.show', compact('student'));
    }

    function attendance($id)
    {
        $attendances = Attendance::with('teacher', 'class', 'student')->where('student_id', $id)->latest()->get();
        return view('children.attendance', compact('attendances'));
    }

}
