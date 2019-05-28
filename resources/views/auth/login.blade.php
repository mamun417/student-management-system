@extends('auth.layouts.app')

@section('content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">SMS</h1>
            </div>
            <h3>Welcome to LSMS</h3>
            <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
            </p>
            <p>Login in. To see it in action.</p>

            <h3 class="border-bottom">Credential</h3>

            <div>
                <p>Admin : admin@test.com - 12345678</p>
                <p>Teacher : teacher@test.com - 12345678</p>
                <p>Parent : parent@test.com - 12345678</p>
                <p>Student : student@test.com - 12345678</p>
            </div>

            <form class="m-t" role="form" action="{{ route('login') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                {{--<div class="col-lg-offset-2 col-lg-10">
                    <div class="i-checks"><label> <input name="remember" {{ old('remember') ? 'checked' : '' }} id="remember" type="checkbox"><i></i> Remember me </label></div>
                </div>--}}

                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="{{ route('password.request') }}">
                    <small>Forgot password?</small>
                </a>
                {{--<p class="text-muted text-center">
                    <small>Do not have an account?</small>
                </p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>--}}
            </form>

        </div>
    </div>

@endsection()
