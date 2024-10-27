<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />   
</head>

<body>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="./index.html" aria-expanded="false">
                        <span>
                          <i class="ti ti-layout-dashboard"></i>
                        </span>
                            <span class="hide-menu">Users</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('backOffice.blogs') }}"  aria-expanded="false">
                        <span>
                          <i class="ti ti-layout-dashboard"></i>
                        </span>
                            <span class="hide-menu">Blogs</span>
                        </a>
                        <li class="sidebar-item">
    <a class="sidebar-link" href="{{ url('/inscrits') }}" aria-expanded="false">
        <span>
            <i class="ti ti-list"></i> <!-- You can change the icon to any suitable one -->
        </span>
        <span class="hide-menu">Inscriptions</span>
    </a>
</li>

                    <li class="sidebar-item">
     <a class="sidebar-link" href="{{ route('formations.index') }}" aria-expanded="false">
        <span>
            <i class="ti ti-layout-grid"></i>
        </span>
        <span class="hide-menu"> Formations</span>
    </a>
</li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('backOffice.providers.home') }}"  aria-expanded="false">
                            <span>
                                <i class="ti ti-layout-dashboard"></i>
                            </span>
                            <span class="hide-menu">Partenaires</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route ('BackOffice.events.index')}}" aria-expanded="false">
                            <span>
                                <i class="ti ti-layout-dashboard"></i>
                            </span>
                            <span class="hide-menu">Evenements</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('reclamations.index1') }}"  aria-expanded="false">
                            <span>
                                <i class="ti ti-layout-dashboard"></i>
                            </span>
                            <span class="hide-menu">reclamation</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('reservation.index') }}"  aria-expanded="false">
                            <span>
                                <i class="ti ti-layout-dashboard"></i>
                            </span>
                            <span class="hide-menu">reservation</span>
                        </a>
                    </li>
                </ul>
            </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-mail fs-6"></i>
                                            <p class="mb-0 fs-3">My Account</p>
                                        </a>
                                        <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-list-check fs-6"></i>
                                            <p class="mb-0 fs-3">My Task</p>
                                        </a>
                                        <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->

         <h1>Edit Reclamation</h1>
        <form action="{{ route('reclamations.update', $reclamation->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="subject">Sujet :</label>
                <input type="text" id="subject" name="subject" class="form-control" value="{{ old('subject', $reclamation->subject) }}">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control">{{ old('description', $reclamation->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
                <div class="py-6 px-6 text-center fixed-bottom">
                    <p class="mb-0 fs-4">Design and Developed by TEAM-CODERS</p>
                </div>
            </div>
        </div>

        <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
</body>

</html>