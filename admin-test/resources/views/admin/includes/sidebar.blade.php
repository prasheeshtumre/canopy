{{-- <style>
    #logout-confirm.modal-backdrop {
        --vz-backdrop-zindex: 1050;
        --vz-backdrop-bg: #000;
        --vz-backdrop-opacity: -0.5;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 0;
        width: 100vw;
        height: 100vh;
        background-color: var(--vz-backdrop-bg);
    }
</style> --}}

<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box" style="background-color:#fff; ">
        <!-- Dark Logo-->
        <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('public/assets/images/logo-canopy1.png') }}" alt="" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('public/assets/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('public/assets/images/logo-canopy1.png') }}" alt="" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('public/assets/images/logo-canopy1.png') }}" alt="" height="60">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                <!--    <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.dashboard') }}" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>

                </li> end Dashboard Menu -->


                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.client_mst') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-file-fill"></i> <span data-key="t-dashboards">Client Master</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.plan_mst') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">

                        <i class="ri-file-fill"></i> <span data-key="t-dashboards">Plan Master</span>

                    </a>

                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.qr_code') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-file-fill"></i> <span data-key="t-dashboards">Generate QR</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.show') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-file-fill"></i> <span data-key="t-dashboards">Report QR Codes</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.update-qr-blade') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-file-fill"></i> <span data-key="t-dashboards">Update Qr Code</span>
                    </a>
                </li>
                <!-- end Dashboard Menu -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="" role="button" aria-expanded="false" aria-controls="sidebarDashboards" data-bs-toggle="modal" data-bs-target="#logout-confirm">
                        <i class="ri-shut-down-fill"></i> <span data-key="t-dashboards">Logout</span>
                    </a>
                </li> <!-- end Dashboard Menu -->
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>