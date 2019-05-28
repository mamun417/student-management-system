@extends('layouts.master')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>All attendance</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('attendances.index') }}">Attendance</a>
                </li>
                <li class="active">
                    <strong>Index</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">

        @include('partials.flash_messages.flashMessages')

        <div class="row">

            @role('teacher')

                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add attendance</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>

                        <div class="ibox-content" style="display: none;">
                            <form method="POST" action="{{ route('attendances.store') }}" class="form-horizontal">
                                @csrf()

                                @include('attendance.element')

                            </form>
                        </div>

                    </div>
                </div>

            @endrole

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Attendance</h5>
                    </div>

                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Student Name</th>
                                    <th>Class</th>
                                    <th>Phone</th>
                                    <th>Teacher</th>
                                    <th>Date</th>
                                    <th>Attendance Type</th>
                                    @role('teacher|admin') <th>Actions</th> @endrole
                                 </tr>
                                </thead>
                                <tbody>

                                @php($i=1)
                                @foreach ($attendances as $item)

                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ ucfirst($item->user->name) }}</td>
                                        <td>{{ ucfirst($item->class->name) }}</td>
                                        <td>{{ $item->userAsStudent->student->phone }}</td>
                                        <td>{{ ucfirst($item->user->name) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($item->attendance_date)) }}</td>

                                        <td>
                                        <span class="badge {{ ($item->attendance_status == 1)?'badge-success':'badge-danger' }}">
                                            {{ ($item->attendance_status == 1)?'Present':'Absent' }}
                                        </span>
                                        </td>

                                        @role('teacher|admin')
                                            <td>
                                                @role('teacher')
                                                    @can('attendance-edit')
                                                        <a title="Edit" href="{{ route('attendances.edit', $item->id) }}" class="cus_mini_icon color-success"> <i class="fa fa-pencil-square-o"></i></a>
                                                    @endcan
                                                @endrole
                                                @role('teacher|admin')
                                                    @can('attendance-delete')
                                                        <a title="Delete" data-toggle="modal" data-target="#myModal{{$item->id}}" type="button" class="cus_mini_icon color-danger"><i class="fa fa-trash"></i></a>
                                                    @endcan
                                                @endrole
                                            </td>
                                        @endrole

                                        <!-- The Modal -->
                                        <div class="modal fade in" id="myModal{{$item->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Delete class</h4>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">

                                                        <h3>You are going to delete ' {{ $item->name }} ' ?</h3>

                                                        <a data-dismiss="modal" class="btn btn-sm btn-warning"><strong>No</strong></a>
                                                        <button class="btn btn-sm btn-primary" type="submit" onclick="event.preventDefault();
                                                            document.getElementById('class-delete-form{{ $item->id }}').submit();">
                                                            <strong>Yes</strong>
                                                        </button>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <form id="class-delete-form{{ $item->id }}" method="POST" action="{{ route('attendances.destroy', $item->id) }}" style="display: none" >
                                            {{method_field('DELETE')}}
                                            @csrf()
                                        </form>

                                    </tr>

                                    @php($i++)
                                @endforeach

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('public/inspinia/js/vue/vue.js') }}"></script>
    <script src="{{ asset('public/inspinia/js/axios/axios.js') }}"></script>

    <script>

        var AttendanceIndex = new Vue({
            el: "#root",
            data: {
                students:[],
                attendance_user_id: '',
            },

            mounted(){
            },

            methods:{
                setStudent(e){
                    currentApp = this;

                    class_id = e.currentTarget.value;
                    axios.get(home_url + '/students/get-student/'+class_id)
                        .then(response => {

                            console.log(response.data);
                            currentApp.students = response.data;
                        })
                },
            }

        })

    </script>

@endsection()
