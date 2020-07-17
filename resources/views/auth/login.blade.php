


@extends( 'layouts.frontend.app' )

@section( 'title','Login' )

@section( 'content' )
        
        {{-- new login form --}}
        <div class="login-box">
            <div class="login-logo">
            <a href="{{ route('login') }}"><b>NUB</b>CBOX</a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group has-feedback">
                        <input id="email" type="email" class="form-control"
                               name="email" value="{{ old('email') }}"
                               autocomplete="email" placeholder="Email">
                    </div>
                    <div class="form-group has-feedback">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                               name="password" autocomplete="current-password" placeholder="Password">
        
                        
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                @if (Route::has('password.request'))
                    <a  href="{{ route('password.request') }}"><i class="mdi mdi-lock"></i> {{ __('Forgot Your Password?') }} </a>
                @endif
                <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
        
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

		@endsection