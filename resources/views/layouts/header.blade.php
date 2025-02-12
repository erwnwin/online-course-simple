<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="{{ route('dashboard') }}" class="navbar-brand"><b>Online Courses</b></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}"><i
                                class="fa fa-home"></i> Home </a></li>
                    <li class="{{ request()->routeIs('kursus*') ? 'active' : '' }}"><a href="kursus"><i
                                class="fa fa-file-alt"></i> Kursus</a></li>

                </ul>

            </div>
            <!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown messages-menu">
                        <!-- Menu toggle button -->
                        <a href="/auth/login">
                            <i class="fa fa-user"></i>
                            Registrasi / Login Akun
                        </a>
                    </li>
                    <!-- User Account Menu -->

                </ul>
            </div>
            <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>
