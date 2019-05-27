@extends('auth.layouts.app')

@section('content')
    <div class="passwordBox animated fadeInDown">

        @include('partials.flash_messages.flashMessages')

        <div class="" style="margin-bottom: 20px"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="ibox-content">
                    <h2 class="font-bold">Forgot password</h2>
                    <p>Enter your email address and your password will be reset and emailed to you.</p>

                    <div class="row">

                        <div class="col-lg-12">
                            <form class="m-t" role="form" action="{{ route('password.email') }}" method="post">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                           value="{{ old('email') }}" placeholder="Email address" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif

                                </div>

                                <button type="submit" class="btn btn-primary block full-width m-b">Send new password link</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright Example Company
            </div>
            <div class="col-md-6 text-right">
                <small>© 2014-2015</small>
            </div>
        </div>
    </div>

@endsection
