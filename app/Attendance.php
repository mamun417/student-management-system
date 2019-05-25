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

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function class()
    {
        return $this->belongsTo(AllClass::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
