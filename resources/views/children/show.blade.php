@extends('layouts.master')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>All Student</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('childrens.index') }}">Children</a>
                </li>
                <li class="active">
                    <strong>Index</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
            <div class="ibox-tools">
                <a href="{{ route('students.create') }}" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><i class="fa fa-plus"></i> <strong>Create</strong></a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">

        @include('partials.flash_messages.flashMessages')

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Student</h5>
                    </div>

                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-sm-4">
                                <img alt="image" class="img-responsive h-300" src="https://www.ldatschool.ca/wp-content/uploads/2015/03/Young-student.jpg">
                            </div>

                            <div class="col-sm-8 border-left">
                                <div class="ibox-content profile-content">
                                    <h4><strong>{{ $student->user->name }}</strong></h4>
                                    <p><i class="fa fa-map-marker"></i> {{ $student->address }} | {{ $student->date_of_birth }}</p>

                                    <p><span class="font-bold">Class : </span> {{ $student->class->name }}</p>

                                    <p><span class="font-bold">Roll Number : </span> {{ $student->roll_number }}</p>

                                    <p><span class="font-bold">Phone : </span> {{ $student->phone }}</p>

                                    <p><span class="font-bold">Email : </span> {{ $student->user->email }}</p>

                                    <p><span class="font-bold">Parent : </span> {{ $student->parent->user->name }}</p>

                                    <p><span class="font-bold">Parent Phone : </span> {{ $student->parent->phone }}</p>

                                    <p><span class="font-bold">Age : </span> {{ $student->age }} Years</p>

                                    <p><span class="font-bold">Gender : </span> {{ $student->gender }}</p>

                                    <p><span class="font-bold">Address : </span> {{ $student->address }}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
