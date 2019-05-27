@extends('layouts.master')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Assign Role</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('roles.index') }}">Role</a>
                </li>
                <li class="active">
                    <strong>Assign role</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Assign role</h5>
                    </div>
                    <div class="ibox-content">

                        <form method="POST" action="{{ route('assign-role.update', $user->id) }}" class="form-horizontal">
                            @csrf()

                            @include('partials.flash_messages.flashMessages')
                            <div class="form-group"></div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Role<span class="required-star"> *</span></label>
                                <div class="col-lg-10">

                                     <select name="roles[]" class="form-control" multiple required>

                                          @foreach($roles as $role)
                                              <option value="{{ $role }}" {{ (in_array($role, $userRole))?'selected':'' }} >{{ $role }}</option>
                                          @endforeach

                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
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
