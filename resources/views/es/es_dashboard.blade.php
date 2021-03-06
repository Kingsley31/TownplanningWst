<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Osisioma Town Planning Authority</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.css')}}">
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('assets/css/shared/style.css')}}">
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="{{asset('assets/css/demo_1/style.css')}}">
    <!-- Layout style -->
    <link rel="shortcut icon" href="{{asset('asssets/images/favicon.ico')}}" />
  </head>
  <body class="header-fixed">
    <!-- partial:partials/_header.html -->
    <nav class="t-header">
      <div class="t-header-brand-wrapper">
        <a href="#" style="color: black">
          Logo
          <!-- <img class="logo" src="{{asset('assets/images/logo.svg')}}" alt="">
          <img class="logo-mini" src="{{asset('assets/images/logo_mini.svg')}}" alt=""> -->
        </a>
      </div>
      <div class="t-header-content-wrapper">
        <div class="t-header-content">
          <button class="t-header-toggler t-header-mobile-toggler d-block d-lg-none">
            <i class="mdi mdi-menu"></i>
          </button>
          <form action="#" class="t-header-search-box">
            <div class="input-group">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search" autocomplete="off">
              <button class="btn btn-primary" type="submit"><i class="mdi mdi-arrow-right-thick"></i></button>
            </div>
          </form>
          <ul class="nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="notificationDropdown" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-bell-outline mdi-1x"></i>
              </a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="notificationDropdown">
                <div class="dropdown-header">
                  <h6 class="dropdown-title">Notifications</h6>
                  <p class="dropdown-title-text">You have 4 unread notification</p>
                </div>
                <div class="dropdown-body">
                  <div class="dropdown-list">
                    <div class="icon-wrapper rounded-circle bg-inverse-primary text-primary">
                      <i class="mdi mdi-alert"></i>
                    </div>
                    <div class="content-wrapper">
                      <small class="name">Storage Full</small>
                      <small class="content-text">Server storage almost full</small>
                    </div>
                  </div>
                  <div class="dropdown-list">
                    <div class="icon-wrapper rounded-circle bg-inverse-success text-success">
                      <i class="mdi mdi-cloud-upload"></i>
                    </div>
                    <div class="content-wrapper">
                      <small class="name">Upload Completed</small>
                      <small class="content-text">3 Files uploded successfully</small>
                    </div>
                  </div>
                  <div class="dropdown-list">
                    <div class="icon-wrapper rounded-circle bg-inverse-warning text-warning">
                      <i class="mdi mdi-security"></i>
                    </div>
                    <div class="content-wrapper">
                      <small class="name">Authentication Required</small>
                      <small class="content-text">Please verify your password to continue using cloud services</small>
                    </div>
                  </div>
                </div>
                <div class="dropdown-footer">
                  <a href="#">View All</a>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="messageDropdown" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-message-outline mdi-1x"></i>
                <span class="notification-indicator notification-indicator-primary notification-indicator-ripple"></span>
              </a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="messageDropdown">
                <div class="dropdown-header">
                  <h6 class="dropdown-title">Messages</h6>
                  <p class="dropdown-title-text">You have 4 unread messages</p>
                </div>
                <div class="dropdown-body">
                  <div class="dropdown-list">
                    <div class="image-wrapper">
                      <img class="profile-img" src="{{asset('assets/images/profile/male/image_1.jpg')}}" alt="profile image">
                      <div class="status-indicator rounded-indicator bg-success"></div>
                    </div>
                    <div class="content-wrapper">
                      <small class="name">Mr. Chima</small>
                      <small class="content-text">Lorem ipsum dolor sit amet.</small>
                    </div>
                  </div>
                  <div class="dropdown-list">
                    <div class="image-wrapper">
                      <img class="profile-img" src="{{asset('assets/images/profile/male/image_1.jpg')}}" alt="profile image">
                      <div class="status-indicator rounded-indicator bg-success"></div>
                    </div>
                    <div class="content-wrapper">
                      <small class="name">Mr. Fred</small>
                      <small class="content-text">Lorem ipsum dolor sit amet.</small>
                    </div>
                  </div>
                  <div class="dropdown-list">
                    <div class="image-wrapper">
                      <img class="profile-img" src="{{asset('assets/images/profile/male/image_1.jpg')}}" alt="profile image">
                      <div class="status-indicator rounded-indicator bg-warning"></div>
                    </div>
                    <div class="content-wrapper">
                      <small class="name">Mr. Jesse</small>
                      <small class="content-text">Lorem ipsum dolor sit amet.</small>
                    </div>
                  </div>
                </div>
                <div class="dropdown-footer">
                  <a href="#">View All</a>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="appsDropdown" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-apps mdi-1x"></i>
              </a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="appsDropdown">
                <div class="dropdown-header">
                  <h6 class="dropdown-title">Apps</h6>
                  <p class="dropdown-title-text mt-2">Authentication required for 3 apps</p>
                </div>
                <div class="dropdown-body border-top pt-0">
                  <a class="dropdown-grid">
                    <i class="grid-icon mdi mdi-jira mdi-2x"></i>
                    <span class="grid-tittle">Provide Content</span>
                  </a>
                  <a class="dropdown-grid">
                    <i class="grid-icon mdi mdi-trello mdi-2x"></i>
                    <span class="grid-tittle">Provide Content</span>
                  </a>
                  <a class="dropdown-grid">
                    <i class="grid-icon mdi mdi-artstation mdi-2x"></i>
                    <span class="grid-tittle">Provide Content</span>
                  </a>
                  <a class="dropdown-grid">
                    <i class="grid-icon mdi mdi-bitbucket mdi-2x"></i>
                    <span class="grid-tittle">Provide Content</span>
                  </a>
                </div>
                <div class="dropdown-footer">
                  <a href="#">View All</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- partial -->
    <div class="page-body">
      <!-- partial:partials/_sidebar.html -->
      <div class="sidebar">
        <div class="user-profile">
          <div class="display-avatar animated-avatar">
            <img class="profile-img img-lg rounded-circle" src="{{asset('assets/images/profile/male/image_1.jpg')}}" alt="profile image">
          </div>
          <div class="info-wrapper">
            <p class="user-name">{{$user->lastname}} {{$user->firstname}}</p>
            <h6 class="display-income">Executive Sacretary</h6>
          </div>
        </div>
        <ul class="navigation-menu">
          
          <li class="nav-category-divider">
                <a href="{{ route('esdashboard') }}">
                <span class="link-title">DASHBOARD</span>
                <i class="mdi mdi-flask link-icon"></i>
                </a>
            
          </li>
         

          <li>
                <a href="{{ route('essearchapps') }}">
                <span class="link-title">SEARCH APPLICATIONS</span>
                <i class="mdi mdi-flask link-icon"></i>
                </a>
            
            </li>
      
          <li>
              <a href="#assessment" data-toggle="collapse" aria-expanded="false">
                <span class="link-title">ASSESSMENTS</span>
                <i class="mdi mdi-flask link-icon"></i>
              </a>
              <ul class="collapse navigation-submenu" id="assessment">
                <li>
                  <a href="{{ route('espendingassessment') }}" >PENDING ASSESSMENTS</a>
                </li>
                <li>
                  <a href="{{ route('escompletedassessment') }}" >COMPLETED ASSESSMENTS</a>
                </li>
              </ul>
          </li>
          

          <li>
            <a href="#reports" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">REPORTS</span>
              <i class="mdi mdi-flask link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="reports">
              <li>
                <a href="{{ route('esreportspendngassignment') }}" >PENDING ASSIGNMENT</a>
              </li>
              <li>
                <a href="{{ route('esassignedreports') }}" >ASSIGNED</a>
              </li>
              <li>
                <a href="{{ route('essubmittedreports') }}" >SUBMITTED</a>
              </li>
            </ul>
        </li>
        

        <li>
          <a href="{{ route('esidpas') }}">
            <span class="link-title">IDPAS</span>
            <i class="mdi mdi-flask link-icon"></i>
          </a>

        </li>

        <li>
            <a href=""  onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <span class="link-title">LOGOUT</span>
                <i class="mdi mdi-flask link-icon"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
      
         

      </ul>
     
      </div>
           <!-- partial -->
           <div class="page-content-wrapper">
              <div class="page-content-wrapper-inner">
                <div class="content-viewport">
                  <div class="row">
                    <div class="col-12 py-5">
                      <h4>Dashboard</h4>
                      <p class="text-gray">Welcome, {{$user->lastname}} {{$user->firstname}}</p>
                    </div>
                  </div>
                  <div class="row">
                   
                    <div class="col-md-3 col-sm-6 col-6 equel-grid">
                      <div class="grid">
                        <div class="grid-body text-gray">
                          <div class="d-flex justify-content-between">
                            <p>{{$pendingassessments}}</p>
                            
                          </div>
                          <p class="text-black">PENDING ASSESSMENTS</p>
                          <div class="wrapper w-50 mt-4">
                            <canvas height="45" id="stat-line_3"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-6 equel-grid">
                      <div class="grid">
                        <div class="grid-body text-gray">
                          <div class="d-flex justify-content-between">
                            <p>{{$pendingreports}}</p>
                            
                          </div>
                          <p class="text-black">PENDING REPORTS</p>
                          <div class="wrapper w-50 mt-4">
                            <canvas height="45" id="stat-line_2"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-6 equel-grid">
                      <div class="grid">
                        <div class="grid-body text-gray">
                          <div class="d-flex justify-content-between">
                            <p>{{$pendingchecklists}}</p>
                            
                          </div>
                          <p class="text-black">PENDING CHECKLIST</p>
                          <div class="wrapper w-50 mt-4">
                            <canvas height="45" id="stat-line_2"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-6 equel-grid">
                      <div class="grid">
                        <div class="grid-body text-gray">
                          <div class="d-flex justify-content-between">
                            <p>{{$pendingidpa}}</p>
                            
                          </div>
                          <p class="text-black">PENDING IDPAs</p>
                          <div class="wrapper w-50 mt-4">
                            <canvas height="45" id="stat-line_2"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                
                
               
                  </div>
                </div>
              </div>
              <!-- content viewport ends -->
              <!-- partial:partials/_footer.html -->
              <footer class="footer">
                <div class="row">
                  <div class="col-sm-6 text-center text-sm-right order-sm-1">
                    <ul class="text-gray">
                      <li><a href="#">Terms of use</a></li>
                      <li><a href="#">Privacy Policy</a></li>
                    </ul>
                  </div>
                  <div class="col-sm-6 text-center text-sm-left mt-3 mt-sm-0">
                      <small class="text-muted d-block">Copyright © 2019 <a href="#" target="_blank">PHETCHA CONSULTS</a>. All rights reserved</small>
                      <small class="text-gray mt-2">Handcrafted With <i class="mdi mdi-heart text-danger"></i></small>
                    </div>
                </div>
              </footer>
              <!-- partial -->
            </div>
      </div>
      <!-- page content ends -->
    </div>
    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    <script src="{{asset('assets/vendors/js/core.js')}}"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <script src="{{asset('assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/vendors/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('assets/js/charts/chartjs.addon.js')}}"></script>
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="{{asset('assets/js/template.js')}}"></script>
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <!-- endbuild -->
  </body>
</html>