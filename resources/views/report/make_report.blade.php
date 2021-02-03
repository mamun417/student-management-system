<head>
    <link href="{{ asset('inspinia/css/bootstrap.min.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('inspinia/css/style.css') }}" rel="stylesheet">--}}

    <style>
        body{
            background-color: transparent;
        }
    </style>
</head>

    <h2 class="text-center">{{ $attendances[0]->user->name }} , {{ $month }}-{{ $year }}</h2>

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

                        </tr>

                        @php($i++)
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>


