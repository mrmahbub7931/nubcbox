@extends('layouts.frontend.app')

@section( 'title','Register' )

@section('content')
<div class="login-box">
    <div class="login-logo">
    <a href="{{ route('register') }}"><b>NUB</b>CBOX</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign up to start your session</p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form method="POST" action="{{ route('register') }}">
            @csrf
           

            <div class="form-group has-feedback">
                <input id="name" type="text" class="form-control"
                       name="name" value="{{ old('name') }}"
                       autocomplete="name" placeholder="name">
            </div>
            
            <div class="form-group has-feedback">
                <input id="email" type="email" class="form-control"
                       name="email" value="{{ old('email') }}"
                       autocomplete="email" placeholder="Email">
            </div>
            <div class="form-group has-feedback">
                <input type="text" id="student_id" name="student_id" class="form-control" placeholder="Student Id">
            </div>

            <div class="form-group has-feedback">
                <input id="password" type="password" class="form-control"
                       name="password" autocomplete="current-password" placeholder="Password">
            </div>
            
            <div class="form-group has-feedback">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password">
            </div>


            <div class="row">
                <div class="col-xs-12 text-center">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign Up</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
    <!-- /.register-box-body -->
</div>
<!-- /.login-box -->
@endsection
