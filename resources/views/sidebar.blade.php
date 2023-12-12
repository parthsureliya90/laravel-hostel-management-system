<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header justify-content-lg-center">
            <!-- Logo -->
            <div>
                <span class="smini-visible fw-bold tracking-wide fs-lg">
                    c<span class="text-primary">b</span>
                </span>
                <a class="link-fx fw-bold tracking-wide mx-auto" href="{{ route('dashboard') }}">
                    <span class="smini-hidden">
                        <i class="fa fa-fire text-primary"></i>
                        <span class="fs-4 text-dual">code</span><span class="fs-4 text-primary">base</span>
                    </span>
                </a>
            </div>
            <div>
            </div>
        </div>
        <div class="js-sidebar-scroll">
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('dashboard') }}">
                            <i class="nav-main-link-icon fa fa-house-user"></i>
                            <span class="nav-main-link-name">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-main-heading">Students Data</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link  " href="{{ route('students') }}">
                            <i class="nav-main-link-icon fa fa-address-card"></i>
                            <span class="nav-main-link-name">Students</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link  " href="{{ route('students_id_card') }}">
                            <i class="nav-main-link-icon fa fa-address-card"></i>
                            <span class="nav-main-link-name">Students ID Card</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link  " href="{{ route('attendance') }}">
                            <i class="nav-main-link-icon fa fa-filter"></i>
                            <span class="nav-main-link-name">Attendance</span>
                        </a>
                    </li>

                    <li class="nav-main-heading">Reprotings</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link  " href="{{ route('fees_report') }}">
                            <i class="nav-main-link-icon fa fa-calendar"></i>
                            <span class="nav-main-link-name">Fees Date Wise</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link  " href="{{ route('fees_pending') }}">
                            <i class="nav-main-link-icon fa fa-info-circle"></i>
                            <span class="nav-main-link-name">Fees Pending</span>
                        </a>
                    </li>
                    {{-- <li class="nav-main-heading">Master Data</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('masterdata') }}">
                            <i class="nav-main-link-icon fa fa-gear"></i>
                            <span class="nav-main-link-name">Master Data</span>
                        </a>
                    </li> --}}
                    <li class="nav-main-heading">Batches</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('batch') }}">
                            <i class="nav-main-link-icon fa fa-gear"></i>
                            <span class="nav-main-link-name">Batches</span>
                        </a>
                    </li>


                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('college') }}">
                            <i class="nav-main-link-icon fa fa-book"></i>
                            <span class="nav-main-link-name">College Master</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">Hostel / Rooms / Buildings Data</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('buildings') }}">
                            <i class="nav-main-link-icon fa fa-book"></i>
                            <span class="nav-main-link-name">Hostel Building </span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('rooms') }}">
                            <i class="nav-main-link-icon fa fa-book"></i>
                            <span class="nav-main-link-name">Hostel Rooms </span>
                        </a>
                    </li>

                    <li class="nav-main-heading">Extras</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('expences') }}">
                            <i class="nav-main-link-icon fa  fa-money-bill-trend-up"></i>
                            <span class="nav-main-link-name">Expences </span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
    </div>
    <!-- Sidebar Content -->
</nav>
