<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('superadmin.dashboard') }}">
                <!-- Logo icon -->
                <b>
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="{{ asset(get_static_option('backend_logo') ?? get_static_option('no_image')) }}" style="max-width: 80px;" alt="" class="dark-logo" />
                    <!-- Light Logo icon -->
                    <img src="{{ asset(get_static_option('backend_light_logo') ?? get_static_option('no_image')) }}" style="max-width: 80px;" alt="" class="light-logo" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span>
                    <!-- dark Logo text -->
                    <img src="{{ asset(get_static_option('backend_text_logo') ?? get_static_option('no_image')) }}" style="max-width: 80px;" alt="" class="dark-logo" />
                    <!-- Light Logo text -->
                    <img src="{{ asset(get_static_option('backend_text_light_logo') ?? get_static_option('no_image')) }}" style="max-width: 80px;" class="light-logo" alt="" />
                </span>
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark"
                                         href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item"> <a
                            class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                            href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                <!-- ============================================================== -->
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">

                <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light"
                                                           href="javascript:void(0)"><i class="ti-settings"></i></a></li>
            </ul>
        </div>
    </nav>
</header>
