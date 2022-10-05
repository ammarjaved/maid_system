<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{asset('assets/images/users/user-9.jpg')}}" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown">James Kennedy</a>
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

                {{-- <li>
                    <a href="#sidebarDashboards" data-bs-toggle="collapse">
                        <i data-feather="airplay"></i>
                        <span class="badge bg-success rounded-pill float-end">4</span>
                        <span> Dashboards </span>
                    </a>
                    <div class="collapse" id="sidebarDashboards">
                        <ul class="nav-second-level">
                            <li>
                                <a href="">Dashboard 1</a>
                            </li>
                            <li>
                                <a href="">Dashboard 2</a>
                            </li>
                            <li>
                                <a href="">Dashboard 3</a>
                            </li>
                            <li> --}}
                                {{-- {{route('any', 'dashboard-4')}} --}}
                                {{-- <a href="">Dashboard 4</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- <li class="menu-title mt-2">Apps</li> --}}

                <li>
                    <a href="{{route ('agency.create')}}">
                        <i data-feather="calendar"></i>
                        <span>Add agency</span>

                    </a>
                </li>
                
                <li>
                    <a href="#sidebarClient" data-bs-toggle="collapse">
                        <i data-feather="file-text"></i>
                        <span> Client </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarClient">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route ('client.create')}}">
                                    
                                    <span>Add Client</span>
            
                                </a>
                            </li>
                            <li>
                                <a href="{{route('client.index')}}">Show</a>
                            </li>
                           
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#sidebarMaid" data-bs-toggle="collapse">
                        <i data-feather="file-text"></i>
                        <span> Maid </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMaid">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route ('maid.create')}}">
                                    
                                    <span>Add Maid</span>
            
                                </a>
                            </li>
                            <li>
                                <a href="{{route('maid.index')}}">Show</a>
                            </li>
                           
                        </ul>
                    </div>
                </li>


               
                
               
                

              

               

                {{-- <li>
                    <a href="#sidebarAuth" data-bs-toggle="collapse">
                        <i data-feather="file-text"></i>
                        <span> Auth Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('second', ['auth', 'login'])}}">Log In</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'login-2'])}}">Log In 2</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'register'])}}">Register</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'register-2'])}}">Register 2</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'signin-signup'])}}">Signin - Signup</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'signin-signup-2'])}}">Signin - Signup 2</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'recoverpw'])}}">Recover Password</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'recoverpw-2'])}}">Recover Password 2</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'lock-screen'])}}">Lock Screen</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'lock-screen-2'])}}">Lock Screen 2</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'logout'])}}">Logout</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'logout-2'])}}">Logout 2</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'confirm-mail'])}}">Confirm Mail</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'confirm-mail-2'])}}">Confirm Mail 2</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

{{--                 
                <li>
                    <a href="#sidebarLayouts" data-bs-toggle="collapse">
                        <i data-feather="layout"></i>
                        <span class="badge bg-blue float-end">New</span>
                        <span> Layouts </span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="nav-second-level">
                            <li>
                                <a href="">Vertical</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['layouts-eg', 'horizontal'])}}">Horizontal</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['layouts-eg', 'detached'])}}">Detached</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['layouts-eg', 'two-column'])}}">Two Column Menu</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['layouts-eg', 'two-tone-icons'])}}">Two Tones Icons</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['layouts-eg', 'preloader'])}}">Preloader</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
               
            
               
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