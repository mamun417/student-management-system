@extends('layouts.master')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>My Profile</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="active">
                    <strong>profile</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Change Profile</h5>
                    </div>
                    <div class="ibox-content">

                        <form method="POST" action="{{ route('profile') }}" class="form-horizontal">
                            @csrf()

                            @include('partials.flash_messages.flashMessages')

                            <div class="form-group"></div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Name<span class="required-star"> *</span></label>
                                <div class="col-lg-10">
                                    <input value="{{ Auth()->user()->name }}" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Email<span class="required-star"> *</span></label>
                                <div class="col-lg-10">
                                    <input value="{{ Auth()->user()->email }}" type="email" class="form-control" name="email" required>
                                </div>
                            </div>

                            {{--<div class="form-group">
                                <label class="col-lg-2 control-label">Phone<span class="required-star"> *</span></label>
                                <div class="col-lg-10">
                                    <input value="{{ Auth()->user()->parent->phone }}" type="text" class="form-control" name="phone" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Address<span class="required-star"> *</span></label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="address" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Age<span class="required-star"> *</span></label>
                                <div class="col-lg-10">
                                    <input type="number" class="form-control" name="age" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Gender<span class="required-star"> *</span></label>
                                <div class="col-lg-10">
                                    <select class="form-control m-b" name="gender" required>
                                        <option value="">--Select--</option>
                                        <option value="male" {{ (isset($student->gender) AND $student->gender == 'male') ? 'selected':old('gender') ==  'male'?'selected' : '' }}>Male</option>
                                        <option value="female" {{ (isset($student->gender) AND $student->gender == 'female') ? 'selected':old('gender') ==  'female'?'selected' : '' }}>Female</option>
                                        <option value="other" {{ (isset($student->gender) AND $student->gender == 'other') ? 'selected':old('gender') ==  'other'?'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                            </div>--}}

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-warning t m-t-n-xs"><strong>Cancel</strong></a>
                                    <button class="btn btn-sm btn-primary m-t-n-xs" type="submit">
                                        <strong>Submit</strong></button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()
