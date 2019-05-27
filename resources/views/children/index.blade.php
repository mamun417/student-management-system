@extends('layouts.master')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>All Children</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('parents.index') }}">Children</a>
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
                        <h5>Children</h5>
                    </div>

                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Name</th>
                                    <th>Roll</th>
                                    <th>Class</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @php($i=1)
                                @foreach ($students as $item)

                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ ucfirst($item->user->name) }}</td>
                                        <td>{{ $item->roll_number }}</td>
                                        <td>{{ ucfirst($item->class->name) }}</td>
                                        <td>{{ $item->user->email }}</td>
                                        <td>{{ $item->phone }}</td>

                                        <td>
                                            <a title="Profile" href="{{ route('childrens.show', $item->id) }}" class="cus_mini_icon color-success"> <i class="fa fa-eye"></i></a>
                                            <a title="Attendance" href="{{ route('childrens.attendance', $item->id) }}" class="cus_mini_icon color-success"> <i class="fa fa-address-book"></i></a>
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
