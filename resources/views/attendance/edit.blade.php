@extends('layouts.master')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Edit Attendance</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('attendances.index') }}">Attendance</a>
                </li>
                <li class="active">
                    <strong>Edit</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
            <div class="ibox-tools  m-t-xl">
                <a href="{{ route('attendances.index') }}" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><i
                        class="fa fa-plus"></i> <strong>Add</strong></a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit attendance</h5>
                    </div>
                    <div class="ibox-content">

                        <form method="POST" action="{{ route('attendances.update', $attendance->id) }}" class="form-horizontal">
                            {{ method_field('PUT') }}
                            @csrf()

                            @include('attendance.element')
                            <input id="attandenec-id" type="hidden" value="{{ $attendance->id }}">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('public/inspinia/js/vue/vue.js') }}"></script>
    <script src="{{ asset('public/inspinia/js/axios/axios.js') }}"></script>

    <script>

        var AttendanceEdit = new Vue({
            el: "#root",
            data: {
                students:[],
                attendance_user_id: '',
            },

            mounted(){
                class_id = $('#class').find(":selected").val();
                this.getStudent(class_id);

                //get current attendance student_id for selected
                axios.get(home_url + '/attendances/'+$('#attandenec-id').val())
                    .then(response => {

                        console.log(response.data);

                        currentApp.attendance_user_id = response.data.student_id;
                    })
            },

            methods:{
                setStudent(e){
                    class_id = e.currentTarget.value;
                    this.getStudent(class_id); // class_id
                },

                getStudent(class_id){
                    currentApp = this;

                    axios.get(home_url + '/students/get-student/'+class_id)
                        .then(response => {
                            currentApp.students = response.data;
                        })
                }
            }

        })

    </script>

@endsection()
    
