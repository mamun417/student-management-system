<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static latest()
 * @method static create()
 */
class Attendance extends Model
{
    protected $fillable = [
        'teacher_id', 'class_id', 'student_id', 'attendance_date', 'attendance_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function userAsStudent()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    /*public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }*/

    public function class()
    {
        return $this->belongsTo(AllClass::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
