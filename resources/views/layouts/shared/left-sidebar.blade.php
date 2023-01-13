<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ asset('assets/images/users/user-9.jpg') }}" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-bs-toggle="dropdown">James Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">
                <li class="menu-title">Navigation</li>
                <li>
                    <a href="{{ Auth::user()->type == 'agency' ? '/dashboard' : '/admin-dashboard' }}">
                        <i data-feather="airplay"></i>

                        <span> Dashboard </span>
                    </a>

                </li>

                <li>
                    <a href="/map-view">
                        <i class="mdi mdi-map-marker"></i>

                        <span> Map </span>
                    </a>

                </li>


                <li class="menu-title mt-2">Apps</li>

                @if (Auth::user()->type == 'superAdmin')
                    <li>
                        <a href="#sidebarClient" data-bs-toggle="collapse">
                            <i data-feather="file-text"></i>
                            <span> Agency </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarClient">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('agency.create') }}">

                                        <span>Add Agency</span>

                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('agency.index') }}">Show</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @else
                    <li>
                        <a href="#sidebarClient" data-bs-toggle="collapse">
                            <i data-feather="file-text"></i>
                            <span> Client </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarClient">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('client.create') }}">

                                        <span>Add Client</span>

                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('client.index') }}">Show</a>
                                </li>

                            </ul>
                        </div>
                    </li>


                    <li>
                        <a href="#sidebarMaid" data-bs-toggle="collapse">
                            <i data-feather="layout"></i>
                            <span> Maid </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarMaid">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('maid.create') }}">

                                        <span>Add Maid</span>

                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('maid.index') }}">Show</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif







            </ul>
        </div>
        </li>
        </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
