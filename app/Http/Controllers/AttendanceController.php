<?php

namespace App\Http\Controllers;

use App\AllClass;
use App\AllParent;
use App\Attendance;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $teachers = Teacher::latest()->get();
        $classes = AllClass::latest()->get();
        $students = Student::latest()->get();

        $attendances = Attendance::latest()->get();

        return view('attendance.index', compact('attendances', 'teachers', 'classes', 'students'));
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
            'teacher_id' => 'required|numeric',
            'class_id' => 'required|numeric',
            'student_id' => 'required|numeric',
            'attendance_date' => 'required|date',
            'attendance_status' => 'required|boolean',
        ]);

        $already_attendance = Attendance::where('teacher_id', $request->teacher_id)
        ->where('class_id', $request->class_id)
        ->where('student_id', $request->student_id)
        ->where('attendance_date', $request->attendance_date)
        ->first();

        if (!empty($already_attendance)){
            return back()->with('warning', 'Attendance already taken');
        }

        $store = Attendance::create($request->all());

        return back();
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
            'teacher_id' => 'required|numeric',
            'class_id' => 'required|numeric',
            'student_id' => 'required|numeric',
            'attendance_date' => 'required|date',
            'attendance_status' => 'required|boolean',
        ]);

        $already_attendance = Attendance::where('teacher_id', $request->teacher_id)
            ->where('class_id', $request->class_id)
            ->where('student_id', $request->student_id)
            ->where('attendance_date', $request->attendance_date)
            ->where('id', '!=', $attendance->id)
            ->first();

        if (!empty($already_attendance)){
            return back()->with('warning', 'Attendance already taken');
        }

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
