
<div id="root">
    <div class="row">
        {{--<div class="col-sm-4">
            <div class="form-group">
                <label>Teacher<span class="required-star"> *</span></label>
                <select class="form-control" name="teacher_id" required>

                    <option value="">--Select--</option>
                    @foreach($teachers as $teacher)
                        <option {{ (isset($attendance->teacher->id) AND $attendance->teacher->id == $teacher->id)?'selected':''}} value="{{ $teacher->id }}">
                            {{ ucfirst($teacher->user->name) .' - '. $teacher->phone }}
                        </option>
                    @endforeach

                </select>
            </div>
        </div>--}}

        <div class="col-sm-4">
            <div class="form-group">
                <label>Class<span class="required-star"> *</span></label>
                <select id="class" @change="setStudent" class="form-control" name="class_id" required>

                    <option value="">--Select--</option>
                    @foreach($classes as $class)
                        <option {{ (isset($attendance->class->id) AND $attendance->class->id == $class->id)?'selected':''}} value="{{ $class->id }}">
                            {{ ucfirst($class->name) }}
                        </option>
                    @endforeach

                </select>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label>Student<span class="required-star"> *</span></label>
                <select class="form-control" name="student_id" required>

                    <option value="">--Select--</option>
                    <option v-for="student in students" :selected="student.id == attendance_user_id ? true : false" :value="student.id">
                        @{{ student.user.name +' - '+ student.roll_number }}
                    </option>

                </select>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label>Date<span class="required-star"> *</span></label>
                <input value="{{ (isset($attendance->attendance_date)?$attendance->attendance_date:'') }}" name="attendance_date" type="date" class="form-control">
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label>Status<span class="required-star"> *</span></label>
                <select class="form-control" name="attendance_status" required>

                    <option value="">--Select--</option>
                    <option {{ (isset($attendance->attendance_status) AND $attendance->attendance_status == 1)?'selected':''}} value="1">Present</option>
                    <option {{ (isset($attendance->attendance_status) AND $attendance->attendance_status == 0)?'selected':''}} value="0">Absent</option>
                </select>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label>&nbsp;</label>
                <div class="">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </div>

    </div>
</div>


