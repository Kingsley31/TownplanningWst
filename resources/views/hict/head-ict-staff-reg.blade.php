<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <p class="user-name">{{$user->firstname}} {{$user->lastname}}</p>
            <h6 class="display-income">HEAD OF ICT</h6>
          </div>
        </div>
        <ul class="navigation-menu">
          <li>
              <a href="{{ route('hictdashboard') }}">
                <span class="link-title">DASHBOARD</span>
                <i class="mdi mdi-flask link-icon"></i>
              </a>
           
          </li>
          <li class="nav-category-divider">
              <a href="{{ route('hictstaffreg') }}">
                <span class="link-title">STAFF REGISTRATION</span>
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
           
                <div class="col-md-12 equel-grid">
                  <div class="grid">
                    <div class="grid-body py-3">
                      <p class="card-title ml-n1">STAFF REGISTRATION</p>
                    </div>
  
  
  
  
  
                    <div class="col-lg-12 equel-grid">
                      <div class="grid">
                        <p class="grid-header"></p>
                        <div class="grid-body">
                          <div class="item-wrapper">
                              @if(session()->has('message'))
                                  <div class="alert alert-success">
                                      {{ session()->get('message') }}
                                  </div>
                              @endif
                            <form method="POST" action="{{ route('regstaff') }}">
                              @csrf
                            <div class="form-group row showcase_row_area">
                                <div class="col-md-3 showcase_text_area">
                                  <label for="firstname">First Name</label>
                                </div>
                                <div class="col-md-9 showcase_content_area">
                                  <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" id="firstname" placeholder="Enter Staff First Name">
                                  @error('firstname')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                              </div>

                              <div class="form-group row showcase_row_area">
                                <div class="col-md-3 showcase_text_area">
                                  <label for="lastname">Last Name</label>
                                </div>
                                <div class="col-md-9 showcase_content_area">
                                  <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" id="lastname" placeholder="Enter Staff Last Name">
                                  @error('lastname')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                              </div>

                              
                               

                                 <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" placeholder="Enter your email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row showcase_row_area">
                                  <div class="col-md-3 showcase_text_area">
                                    <label for="username">User Name</label>
                                  </div>
                                  <div class="col-md-9 showcase_content_area">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" id="username" placeholder="Username">
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                </div>

                               <div class="form-group row showcase_row_area">
                                <div class="col-md-3 showcase_text_area">
                                  <label for="phone">Phone <i class="zmdi zmdi-format-list-numbered"></i></label>
                                </div>
                                <div class="col-md-9 showcase_content_area">
                                  <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" id="phone" placeholder="Enter your phone number">
                                  @error('phone')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                              </div>


                              <div class="form-group row showcase_row_area">
                                  <div class="col-md-3 showcase_text_area">
                                    <label for="office">STAFF ROLE</label>
                                  </div>
                                  <div class="col-md-9 showcase_content_area">
                                      <select class="custom-select" id="office" name="office">
                                          <option value="0">Select staff role</option>
                                          <option value="CLERK">CLERK</option>
                                          <option value="HICT">HEAD OF ICT</option>
                                          <option value="HOA">HEAD OF ADMIN</option>
                                          <option value="TPO">TPO</option>
                                          <option value="ATPO">ATPO</option>
                                          <option value="ES">EXECUTIVE SECRETORY</option>
                                          <option value="HAC">HEAD OF ACCOUNT</option>
                                          <option value="ACO">ACCOUNT OFFICER</option>
                                          <option value="HO">HEALTH OFFICER</option>
                                          <option value="ENG">ENGINEER</option>
                                         
                                      </select>
                                      @error('office')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                </div>

                                <div class="form-group row showcase_row_area">
                                  <div class="col-md-3 showcase_text_area">
                                    <label for="department">STAFF DEPARTMENT</label>
                                  </div>
                                  <div class="col-md-9 showcase_content_area">
                                      <select class="custom-select" id="department" name="department">
                                          <option value="0">Select staff department</option>
                                          <option value="ADMIN">Admin</option>
                                          <option value="ICT">ICT</option>
                                          <option value="DEVC">Development Controll</option>
                                          <option value="PPI">PPI</option>
                                          <option value="ES">ES</option>
                                          <option value="ACCT">Account</option>
                                          <option value="HEALTH">HEALTH</option>
                                          <option value="CIVIL">CIVIL</option>
                                         
                                      </select>
                                      @error('department')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                </div>


                                <div class="form-group row showcase_row_area">
                              <div class="col-md-3 showcase_text_area">
                                <label for="password">Password</label>
                              </div>
                              <div class="col-md-9 showcase_content_area">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" id="password" placeholder="Enter your password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group row showcase_row_area">
                              <div class="col-md-3 showcase_text_area">
                                <label for="password_confirmation">Confirm Password</label>
                              </div>
                              <div class="col-md-9 showcase_content_area">
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" id="password_confirmation" placeholder="Enter your password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                            </div>

                               

                             
                              <div class="form-group row showcase_row_area">
                                  <div class="col-md-3 showcase_text_area">
                                    <label for="inputEmail5"></label>
                                  </div>
                                  <div class="col-md-9 showcase_content_area">
                                      <button type="submit" class="btn btn-sm btn-primary"> Submit Staff Details</button>
                                    
                                  </div>
                                </div>

  
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
              
                  
                </div>
                <script src="{{asset('js/jquery.js')}}"></script>
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
    <script src="assets/vendors/js/core.js"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/js/charts/chartjs.addon.js"></script>
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="assets/js/template.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <!-- endbuild -->
  </body>
</html>