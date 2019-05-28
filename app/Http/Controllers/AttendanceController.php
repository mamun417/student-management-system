<?php

namespace App\Http\Controllers;

use App\AllClass;
use App\AllParent;
use App\Attendance;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware('role:teacher|student|admin');
        $this->middleware(['role:teacher', 'permission:attendance-edit'], ['only' => 'show']);
        $this->middleware('permission:attendance-list', ['only' => 'index']);
        $this->middleware(['role:teacher', 'permission:attendance-create'], ['only' => ['store']]);
        $this->middleware(['role:teacher', 'permission:attendance-edit'], ['only' => ['edit','update']]);
        $this->middleware(['role:teacher|admin', 'permission:attendance-delete'], ['only' => ['destroy']]);
    }

    public function index()
    {
        $teachers = Teacher::latest()->get();
        $classes = AllClass::latest()->get();

        if (Auth()->user()->hasRole('admin')) {
            $attendances = Attendance::with('user', 'user.teacher', 'class', 'userAsStudent.student')->latest()->get();

        } else if (Auth()->user()->hasRole('student')) {
            $attendances = Attendance::with('user', 'user.teacher', 'class', 'userAsStudent.student')->latest()->where('student_id', Auth()->user()->id)->get();

        }  else if (Auth()->user()->hasRole('teacher')) {
            $attendances = Attendance::with('user', 'user.teacher', 'class', 'userAsStudent.student')->latest()->where('teacher_id', Auth()->user()->id)->get();
        }

        return view('attendance.index', compact('attendances', 'teachers', 'classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required|numeric',
            'student_id' => 'required|numeric',
            'attendance_date' => 'required|date',
            'attendance_status' => 'required|boolean',
        ]);

        $already_attendance = Attendance::where('teacher_id', Auth()->user()->id)
        ->where('class_id', $request->class_id)
        ->where('student_id', $request->student_id)
        ->where('attendance_date', $request->attendance_date)
        ->first();

        if (!empty($already_attendance)){
            return back()->with('warning', 'Attendance already taken');
        }

        $request['teacher_id'] = Auth()->user()->id;

        $store = Attendance::create($request->all());

        return redirect(route('attendances.index'))->with('success', 'Attendance add successfully');
    }

    /**
     * Get specific attendance info
     * Use it from edit
     * @param Attendance $attendance
     * @return Attendance
     */
    public function show(Attendance $attendance)
    {
        return $attendance;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Attendance $attendance
     * @return Response
     */
    public function edit(Attendance $attendance)
    {
        $teachers = Teacher::latest()->get();
        $classes = AllClass::latest()->get();
        $students = Student::latest()->get();

        //dd($attendance->teacher->toArray());

        return view('attendance.edit', compact('attendance', 'teachers', 'classes', 'students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Attendance $attendance
     * @return Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'class_id' => 'required|numeric',
            'student_id' => 'required|numeric',
            'attendance_date' => 'required|date',
            'attendance_status' => 'required|boolean',
        ]);

        $already_attendance = Attendance::where('teacher_id', Auth()->user()->id)
            ->where('class_id', $request->class_id)
            ->where('student_id', $request->student_id)
            ->where('attendance_date', $request->attendance_date)
            ->where('id', '!=', $attendance->id)
            ->first();

        if (!empty($already_attendance)){
            return back()->with('warning', 'Attendance already taken');
        }

        $request['teacher_id'] = Auth()->user()->id;

        $attendance->update($request->all());
        return redirect(route('attendances.index'))->with('success', 'Attendance update successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Attendance $attendance
     * @return Response
     * @throws \Exception
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return back()->with('success', 'Attendance delete successfully');
    }
}
