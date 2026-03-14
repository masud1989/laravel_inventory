  <div class="app-sidebar-menu">
                <div class="h-100" data-simplebar>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <div class="logo-box">
                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('admin/assets/images/logo-sm.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('admin/assets/images/logo-light.png') }}" alt="" height="24">
                                </span>
                            </a>
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('admin/assets/images/logo-sm.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('admin/assets/images/logo-dark.png') }}" alt="" height="24">
                                </span>
                            </a>
                        </div>

                        <ul id="side-menu">

                            <li class="menu-title">Menu</li>
                            <li>
                                <a href="{{ route('dashboard') }}" class="tp-link">
                                      <i data-feather="home"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                        
                
                            <!-- <li>
                                <a href="landing.html" target="_blank">
                                    <i data-feather="globe"></i>
                                    <span> Landing </span>
                                </a>
                            </li> -->

                            <li class="menu-title">Pages</li>

                            <li>
                                <a href="#sidebarAuth" >
                                    <i data-feather="users"></i>
                                    <span>Manage Brand </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarAuth">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('all.brand') }}" class="tp-link">All Brand</a>
                                            {{-- <a href="{{ route('all.brand') }}" class="tp-link">All Brand</a> --}}
                                        </li>
                                        <li>
                                            <a href="{{ route('add.brand') }}" class="tp-link">Add New Brand</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li>
                                <a href="#sidebarAuth" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span>Manage Supplier </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarAuth">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('all.supplier') }}" class="tp-link">All Supplier</a>
                                            {{-- <a href="{{ route('all.brand') }}" class="tp-link">All Brand</a> --}}
                                        </li>
                                        <li>
                                            <a href="{{ route('add.supplier') }}" class="tp-link">Add New Supplier</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                             <li>
                                <a href="#WareHouse" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span> WareHouse Manage </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="WareHouse">
                                    <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('all.warehouse') }}" class="tp-link">All WareHouse</a>
                            </li>   
                                <li>
                                    <a href="{{ route('add.warehouse') }}" class="tp-link">Add New WareHouse</a>
                            </li>   
                                            
                                    </ul>
                                </div>
                            </li>

                             
                                 <li>
                                <a href="#sidebarError" data-bs-toggle="collapse">
                                    <i data-feather="alert-octagon"></i>
                                    <span> Customer Manage</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarError">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('add.customer') }}" class="tp-link">Add Customer </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('all.customer') }}" class="tp-link">All Customer</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>



                            <li>
                                <a href="#sidebarError" data-bs-toggle="collapse">
                                    <i data-feather="alert-octagon"></i>
                                    <span> Error Page</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarError">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="error-404.html" class="tp-link">Error 404</a>
                                        </li>
                                        <li>
                                            <a href="error-500.html" class="tp-link">Error 500</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            

                            <li>
                                <a href="#sidebarExpages" data-bs-toggle="collapse">
                                    <i data-feather="file-text"></i>
                                    <span> Utility </span>
                                    <span class="menu-arrow"></span>
                                </a>
                        
                            </li>

                            <li>
                                <a href="calendar.html" class="tp-link">
                                    <i data-feather="calendar"></i>
                                    <span> Calendar </span>
                                </a>
                            </li>

                            <li class="menu-title mt-2">Report Section</li>

                            <li>
                                <a href="#sidebarBaseui" data-bs-toggle="collapse">
                                    <i data-feather="package"></i>
                                    <span> Reports </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarBaseui">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="ui-accordions.html" class="tp-link">Maintenance Report-1</a>
                                        </li>
                                        <li>
                                            <a href="ui-alerts.html" class="tp-link">Report-2</a>
                                        </li>
                                        <li>
                                            <a href="ui-badges.html" class="tp-link">Report-3</a>
                                        </li>
                                        <li>
                                            <a href="ui-breadcrumb.html" class="tp-link">Report-4</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
                        </ul>
            
                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
            </div>