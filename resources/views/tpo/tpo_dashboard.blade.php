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
    <link rel="stylesheet" href="{{ asset('assets/css/shared/style.css')}}">
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
                      <img class="profile-img" src="../assets/images/profile/male/image_1.jpg" alt="profile image">
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
            <h6 class="display-income">TPO</h6>
          </div>
        </div>
        <ul class="navigation-menu">
            <li class="nav-category-divider">
                <a href="{{ route('tpodashboard') }}">
                  <span class="link-title">DASHBOARD</span>
                  <i class="mdi mdi-flask link-icon"></i>
                </a>
             
            </li>
            <li>
                <a href="{{ route('tposlp') }}">
                  <span class="link-title">SITE LOCATION PLAN</span>
                  <i class="mdi mdi-flask link-icon"></i>
                </a>
             
            </li>
            <li>
              <a href="{{ route('tpoassessment') }}">
                <span class="link-title">ASSESSMENT</span>
                <i class="mdi mdi-flask link-icon"></i>
              </a>
           
            </li>
            <li>
                <a href="#sirs" data-toggle="collapse" aria-expanded="false">
                  <span class="link-title">SIR</span>
                  <i class="mdi mdi-flask link-icon"></i>
                </a>
                <ul class="collapse navigation-submenu" id="sirs">
                  <li>
                    <a href="{{ route('tpopendingsirs') }}" >PENDING SIR</a>
                  </li>
                  <li>
                    <a href="{{ route('tpocompletedsirs') }}" >COMPLETED SIR</a>
                  </li>
                </ul>
            </li>
            <li>
                <a href="#ppis" data-toggle="collapse" aria-expanded="false">
                  <span class="link-title">PPI</span>
                  <i class="mdi mdi-flask link-icon"></i>
                </a>
                <ul class="collapse navigation-submenu" id="ppis">
                  <li>
                    <a href="{{ route('tpopendingppis') }}" >PENDING PPI</a>
                  </li>
                  <li>
                    <a href="{{ route('tpocompletedppis') }}" >COMPLETED PPI</a>
                  </li>
                </ul>
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
                    <div class="col-lg-4">
                        <label for="">Search Criteria </label>
                            <div class="showcase_content_area">
                                <select class="custom-select" id="searchcriteria">
                                    <option value="firstname">First Name</option>
                                    <option value="surname">Surname</option>
                                    <option value="phone">Phone Number</option>
                                    <option value="village">Village</option>
                                    <option value="zone">Zone</option>
                                    <option value="superzone">Super Zone</option>
    
                                 </select>                      
                        
                    </div>                  
                  </div>

                  <div class="col-lg-6">
                    <div class="showcase_text_area">
                        <label for="inputType12">Search</label>
                      </div>
                      <div class="showcase_content_area">
                        <input type="text" class="form-control" id="searchbox" placeholder="Search Application">
                      
                      </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="showcase_text_area">
                            <label for="inputType12"></label>
                          </div>
                          <div class="showcase_content_area">
                            
                            <button id="searchbtn" class="btn btn-danger">Search </button>
                          </div>
                        </div>



                  </div>
                  <div class="row">
           
                   
                  </div>

                  <div class="col-md-12 equel-grid">
                    <div class="grid">
                      <div class="grid-body py-3">
                      
                      </div>
                      <div class="table-responsive">
                        <table class="table table-hover table-sm ">
                          <thead>
                            <tr class="solid-header">
                                <th>FILE NUMBER</th>
                                <th>NAME OF DEVELOPER</th>
                                <th>TYPE OF BUILDING</th>
                                <th>APPLICATION STAGE</th>
                                <th>APPLICATION STATUS</th>
                                <th>HEIGHT OF BUILDING</th>
                                <th>SUPERZONE</th>
                                <th>ZONE</th>
                                <th>VILLAGE</th>
                                <th>DATE OF SUBMISSION</th>
    
                            </tr>
                          </thead>
                          <tbody id="tablebody">
                           
                            
                          </tbody>
                        </table>
                      </div>
                      <a class="border-top px-3 py-2 d-block text-gray" href="#">
                        <small class="font-weight-medium"><i class="mdi mdi-chevron-down mr-2"></i>View All </small>
                      </a>
                    </div>
                  </div>
              
                  
                </div>
                <script src="{{asset('js/jquery.js')}}"></script>
                <script>
                      jQuery(document).ready(function(){
                        $('#searchbtn').click(function(e){
                            e.preventDefault();
                            var searchby=$('#searchcriteria').val();
                            var searchstring=$('#searchbox').val();
                            console.log("querying the rout");
                            $.ajaxSetup({
                              headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                            });
    
                            
                            $.post("/search/app",
                            {
                              searchcriteria: searchby,
                              searchtext: searchstring
                            },
                              function(data, status){
                                if (data != undefined || data.length != 0) {
                                  $("#tablebody").empty();
                                  data.forEach(function(application){
                                    var tr="<tr>";
                                    tr=tr+"<td>"+application.file_no+"</td>";
                                    tr=tr+"<td>"+application.user.firstname+" "+application.user.lastname+"</td>";
                                    tr=tr+"<td>"+application.building_type+"</td>";
                                    tr=tr+"<td>"+application.app_stage+"</td>";
                                    tr=tr+"<td>"+application.app_stage_status+"</td>";
                                    tr=tr+"<td>"+application.app_building_height+"</td>";
                                    tr=tr+"<td>"+application.superzone.name+"</td>";
                                    tr=tr+"<td>"+application.zone.zone_name+"</td>";
                                    tr=tr+"<td>"+application.village.village_name+"</td>";
                                    tr=tr+"<td>"+application.created_at+"</td>";
                                    tr=tr+"</tr>";
                                    $("#tablebody").append(tr);
                                  });
                                }
                              });
                          });
                      });
                  </script>
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
    <script src="../assets/vendors/js/core.js"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <script src="../assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendors/chartjs/Chart.min.js"></script>
    <script src="../assets/js/charts/chartjs.addon.js"></script>
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="../assets/js/template.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    <!-- endbuild -->
  </body>
</html>