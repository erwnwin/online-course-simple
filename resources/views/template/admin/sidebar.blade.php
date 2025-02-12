<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('assets/img/users.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">



            @php
                $role = Auth::user()->role ?? 'guest'; // Jika tidak ada user, default 'guest'
            @endphp


            @if ($role == 'dosen')
                <li class="header">Pengguna</li>

                <li class="{{ request()->routeIs('dashboard.pengajar*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.pengajar') }}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('profil.pengajar*') ? 'active' : '' }}">
                    <a href="{{ route('profil.pengajar') }}">
                        <i class="fa fa-user"></i> <span>Profil</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off"></i> <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                        @csrf
                    </form>
                </li>

                <li class="header">TEACHER</li>

                <li class="{{ request()->is('pengajar/courses*') ? 'active' : '' }}">
                    <a href="{{ route('courses.pengajar') }}">
                        <i class="fa fa-edit"></i> <span>Course</span>
                    </a>
                </li>
            @endif

            @if ($role == 'mahasiswa')
                <li class="header">Pengguna</li>

                <li class="{{ request()->routeIs('dashboard.pelajar*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.pelajar') }}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('profil.pelajar*') ? 'active' : '' }}">
                    <a href="{{ route('profil.pelajar') }}">
                        <i class="fa fa-user"></i> <span>Profil</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off"></i> <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                        @csrf
                    </form>
                </li>
                <li class="header">STUDENT</li>



                <li class="{{ request()->is('students/courses*') ? 'active' : '' }}">
                    <a href="{{ route('pelajar.courses') }}">
                        <i class="fa fa-edit"></i> <span>Course</span>
                    </a>
                </li>
            @endif

            @if ($role == 'admin')
                <li class="header">Pengguna</li>

                <li class="{{ request()->routeIs('dashboard*') ? 'active' : '' }}">
                    <a href="/dashboard">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('profil*') ? 'active' : '' }}">
                    <a href="/profil">
                        <i class="fa fa-user"></i> <span>Profil</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off"></i> <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                        @csrf
                    </form>
                </li>


                <li class="header">ADMIN</li>



                <li class="{{ request()->routeIs('courses*') ? 'active' : '' }}">
                    <a href="/courses">
                        <i class="fa fa-edit"></i> <span>Course</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('students*') ? 'active' : '' }}">
                    <a href="/students">
                        <i class="fa fa-users"></i> <span>Students</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('teachers*') ? 'active' : '' }}">
                    <a href="/teachers">
                        <i class="fa fa-user"></i> <span>Teachers</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('enroll*') ? 'active' : '' }}">
                    <a href="/enroll">
                        <i class="fa fa-user-plus"></i> <span>Enroll</span>
                    </a>
                </li>
            @endif



        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
