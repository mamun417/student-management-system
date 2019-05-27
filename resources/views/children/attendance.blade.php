@extends('layouts.master')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>All attendance</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('childrens.index') }}">Children</a>
                </li>
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
                                </tr>
                                </thead>
                                <tbody>

                                @php($i=1)
                                @foreach ($attendances as $item)

                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ ucfirst($item->student->user->name) }}</td>
                                        <td>{{ ucfirst($item->class->name) }}</td>
                                        <td>{{ $item->student->phone }}</td>
                                        <td>{{ ucfirst($item->teacher->user->name) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($item->attendance_date)) }}</td>

                                        <td>
                                        <span class="{{ ($item->attendance_status == 1)?'badge-success':'badge-danger' }}" style="padding: 0 2px;border-radius: 3px">
                                            {{ ($item->attendance_status == 1)?'Present':'Absent' }}
                                        </span>
                                        </td>
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

@endsection()
