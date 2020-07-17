<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @if (isset(Auth::user()->avatar))
                <img src="{{ Storage::disk('public')->url('users/'.Auth::user()->avatar) }}" class="img-circle" alt="User Image">
                @else
                <img src="{{ asset('backend/assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                @endif
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            @if(Request::is( 'admin*' ))
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">

                    <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard text-white"></i><span>Dashboard</span></a>
                </li>
                <li class="treeview {{ Request::is('admin/category/*') || Request::is() ? 'active' : '' }}">
                    <a href="javascript:void(0)"><i class="fa fa-book"></i><span>Department</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-double-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('admin.category.create') }}">New Department</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.category.index') }}">Department List</a>
                        </li>
                    </ul>
                </li>
                
                <li class="treeview {{ Request::is('admin/sub_category') ? 'active' : '' }}">
                    <a href="javascript:void(0)"><i class="fa fa-user-plus"></i><span>Employee</span>
                        
                        <span class="pull-right-container">
                            <i class="fa fa-angle-double-right"></i>
                        </span>
                        
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('admin.sub_category.create') }}">New Employee</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.sub_category.index') }}">Employee List</a>
                        </li>
                    </ul>
                </li>
                
                <li class="treeview {{ Request::is('admin/users/*') ? 'active' : '' }}">
                    <a href="javascript:void(0)"><i class="fa fa-graduation-cap"></i><span>Student</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-double-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('admin.users.create') }}">New Student</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users.index') }}">Student List</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview {{ Request::is('admin/u/*') ? 'active' : '' }}">
                    <a href="javascript:void(0)"><i class="fa fa-users"></i><span>Users</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-double-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('admin.u.create') }}">New Users</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.u.index') }}">User List</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview {{ Request::is('admin/emails/*') ? 'active' : '' }}">
                    <a href="javascript:void(0)"><i class="fa fa-envelope"></i><span>Emails</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-double-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('admin.emails') }}">Inboxes</a>
                        </li>
                    </ul>
                </li>
            @endif

            {{-- author route --}}
            @if(Request::is( 'author*' ))
                    <li class="{{ Request::is('author/dashboard') ? 'active' : '' }}">
                        <a href="{{ route('author.dashboard') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                    </li>
                    <li class="treeview {{ Request::is('author/emails') ? 'active' : '' }}">
                        <a href="javascript:void(0)"><i class="fa fa-envelope"></i><span>Emails</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-double-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('author.emails') }}">Read Mail</a>
                            </li>
                        </ul>
                    </li>
            @endif

            {{-- subscirber route --}}
            @if( Request::is( 'user*' ) || Request::is( 'email' ) || Request::is( 'email/*' ) )
                <li class="{{ Request::is('user/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('user.dashboard') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                </li>
                
                <li class="treeview {{ Request::is('user/emails') ? 'active' : '' }}">
                    <a href="javascript:void(0)"><i class="fa fa-envelope"></i><span>Emails</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-double-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('user.emails') }}">Sent Mail</a>
                            <a href="{{ route('user.email.form') }}">Compose Email</a>
                        </li>
                    </ul>
                </li>

            @endif

            <li class="header">BOTTOM</li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out text-red"></i> <span>{{ __('Sign out') }}</span></a></li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>