<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>NUB</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>NUB</b>CBOX</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if (isset(Auth::user()->avatar))
                        <img src="{{ Storage::disk('public')->url('users/'.Auth::user()->avatar) }}" class="user-image" alt="User Image">
                        @else
                        <img src="{{ asset('backend/assets/dist/img/user2-160x160.jpg') }}" class="user-image"
                             alt="User Image">
                        @endif
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            @if (isset(Auth::user()->avatar))
                            <img src="{{ Storage::disk('public')->url('users/'.Auth::user()->avatar) }}" class="img-circle" alt="User Image">
                            @else
                            <img src="{{ asset('backend/assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                            @endif
                            <p>
                                {{ Auth::user()->name }}
                                <small>Member since {{ date('F d, Y', strtotime(Auth::user()->created_at)) }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                @if (Auth::user()->role->slug === 'student')
                                <a href=" {{ route('user.show',Auth::user()->id) }} " class="btn btn-default btn-flat">Profile</a>
                                @elseif(Auth::user()->role->slug === 'staff')
                                <a href=" {{ route('author.show',Auth::user()->id) }} " class="btn btn-default btn-flat">Profile</a>
                                @else
                                <a href=" {{ route('admin.show',Auth::user()->id) }} " class="btn btn-default btn-flat">Profile</a>
                                @endif
                            </div>
                            <div class="pull-right">
                                {{--<a href="#" class="btn btn-default btn-flat">Sign out</a>--}}
                                <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>