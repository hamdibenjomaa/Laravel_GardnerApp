<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Items List</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/inter-ui/3.19.3/inter.css'>

<link rel="stylesheet" href="{{ asset('css/home.css') }}">
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
                        <a class="sidebar-link" href="./index.html" aria-expanded="false">
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
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-outline-primary mx-3 mt-2 d-block">
        Logout
    </button>
</form>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->

            <div class="container-fluid">
  <div class="containerr">
    <div class="grid">

      <!-- Card 1 -->
      <a href="{{ route('backOffice.items.index') }}" class="card">
        <span class="icon">
          <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.2"
            stroke-linecap="round"
            stroke-linejoin="round"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M14.5 3.5C14.5 3.5 14.5 5.5 12 5.5C9.5 5.5 9.5 3.5 9.5 3.5H7.5L4.20711 6.79289C3.81658 7.18342 3.81658 7.81658 4.20711 8.20711L6.5 10.5V20.5H17.5V10.5L19.7929 8.20711C20.1834 7.81658 20.1834 7.18342 19.7929 6.79289L16.5 3.5H14.5Z"
            />
          </svg>
        </span>
        <h4>Products</h4>
        <p>Update and manage your products</p>
        <div class="shine"></div>
        <div class="background">
          <div class="tiles">
            <div class="tile tile-1"></div>
            <div class="tile tile-2"></div>
            <div class="tile tile-3"></div>
            <div class="tile tile-4"></div>
            <div class="tile tile-5"></div>
            <div class="tile tile-6"></div>
            <div class="tile tile-7"></div>
            <div class="tile tile-8"></div>
            <div class="tile tile-9"></div>
            <div class="tile tile-10"></div>
          </div>
          <div class="line line-1"></div>
          <div class="line line-2"></div>
          <div class="line line-3"></div>
        </div>
      </a>

      <!-- Card 2 -->
      <a href="{{ route('backOffice.providers.index') }}" class="card">
        <span class="icon">
          <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.2"
            stroke-linecap="round"
            stroke-linejoin="round"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M4.5 9.5V5.5C4.5 4.94772 4.94772 4.5 5.5 4.5H9.5C10.0523 4.5 10.5 4.94772 10.5 5.5V9.5C10.5 10.0523 10.0523 10.5 9.5 10.5H5.5C4.94772 10.5 4.5 10.0523 4.5 9.5Z"
            />
            <path
              d="M13.5 18.5V14.5C13.5 13.9477 13.9477 13.5 14.5 13.5H18.5C19.0523 13.5 19.5 13.9477 19.5 14.5V18.5C19.5 19.0523 19.0523 19.5 18.5 19.5H14.5C13.9477 19.5 13.5 19.0523 13.5 18.5Z"
            />
            <path d="M4.5 19.5L7.5 13.5L10.5 19.5H4.5Z" />
            <path
              d="M16.5 4.5C18.1569 4.5 19.5 5.84315 19.5 7.5C19.5 9.15685 18.1569 10.5 16.5 10.5C14.8431 10.5 13.5 9.15685 13.5 7.5C13.5 5.84315 14.8431 4.5 16.5 4.5Z"
            />
          </svg>
        </span>
        <h4>Providers</h4>
        <p>Update and manage your providers</p>
        <div class="shine"></div>
        <div class="background">
          <div class="tiles">
            <div class="tile tile-1"></div>
            <div class="tile tile-2"></div>
            <div class="tile tile-3"></div>
            <div class="tile tile-4"></div>
            <div class="tile tile-5"></div>
            <div class="tile tile-6"></div>
            <div class="tile tile-7"></div>
            <div class="tile tile-8"></div>
            <div class="tile tile-9"></div>
            <div class="tile tile-10"></div>
          </div>
          <div class="line line-1"></div>
          <div class="line line-2"></div>
          <div class="line line-3"></div>
        </div>
      </a>

    </div>
  </div>

  <div class="py-6 px-6 text-center fixed-bottom">
    <p class="mb-0 fs-4">Design and Developed by TEAM-CODERS</p>
  </div>
</div>

        </div>
    </div>

    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="../assets/js/dashboard.js"></script>
<script src="{{ asset('js/home.js') }}"></script>
</body>

</html>
