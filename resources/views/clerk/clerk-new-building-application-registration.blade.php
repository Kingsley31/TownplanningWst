<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Osisioma Town Planning Authority</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.css') }}">
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/shared/style.css') }}">
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}">
    <!-- Layout style -->
    <link rel="shortcut icon" href="{{ asset('asssets/images/favicon.ico') }}" />
  </head>
  <body class="header-fixed">
    <!-- partial:partials/_header.html -->
    <nav class="t-header">
      <div class="t-header-brand-wrapper">
        <a href="#" style="color: black">
          Logo
          <!-- <img class="logo" src="{{ asset('assets/images/logo.svg') }}" alt="">
          <img class="logo-mini" src="{{ asset('assets/images/logo_mini.svg') }}" alt=""> -->
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
                      <img class="profile-img" src="{{ asset('assets/images/profile/male/image_1.jpg') }}" alt="profile image">
                      <div class="status-indicator rounded-indicator bg-success"></div>
                    </div>
                    <div class="content-wrapper">
                      <small class="name">Mr. Chima</small>
                      <small class="content-text">Lorem ipsum dolor sit amet.</small>
                    </div>
                  </div>
                  <div class="dropdown-list">
                    <div class="image-wrapper">
                      <img class="profile-img" src="{{ asset('assets/images/profile/male/image_1.jpg') }}" alt="profile image">
                      <div class="status-indicator rounded-indicator bg-success"></div>
                    </div>
                    <div class="content-wrapper">
                      <small class="name">Mr. Fred</small>
                      <small class="content-text">Lorem ipsum dolor sit amet.</small>
                    </div>
                  </div>
                  <div class="dropdown-list">
                    <div class="image-wrapper">
                      <img class="profile-img" src="{{ asset('assets/images/profile/male/image_1.jpg') }}" alt="profile image">
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
            <img class="profile-img img-lg rounded-circle" src="{{ asset('assets/images/profile/male/image_1.jpg')}}" alt="profile image">
          </div>
          <div class="info-wrapper">
            <p class="user-name">{{$user->lastname}} {{$user->firstname}}</p>
            <h6 class="display-income">Clerk</h6>
          </div>
        </div>
        <ul class="navigation-menu">
        

          <li>
                <a href="{{ route('clerkdashboard') }}">
                  <span class="link-title">DASHBOARD</span>
                  <i class="mdi mdi-flask link-icon"></i>
                </a>
             
            </li>

            <li>
                <a href="{{ route('clerkuserregister') }}">
                  <span class="link-title">REGISTER USER</span>
                  <i class="mdi mdi-flask link-icon"></i>
                </a>
             
            </li>

            <li class="nav-category-divider">
                <a href="{{ route('clerkappregister') }}">
                  <span class="link-title">BUILDING REGISTRATION</span>
                  <i class="mdi mdi-flask link-icon"></i>
                </a>
             
            </li>
            <li>
                <a href="{{ route('clerkappdocumentregister') }}">
                  <span class="link-title">BUILDING DOCUMENTS REGISTRATION</span>
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
                <p class="text-gray">Welcome , {{$user->lastname}} {{$user->firstname}}</p>
              </div>
            </div>
           
            <div class="row">
           
                <div class="col-md-12 equel-grid">
                  <div class="grid">
                    <div class="grid-body py-3">
                      <p class="card-title ml-n1">BUILDING APPLICATION REGISTRATION</p>
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
                            <form method="POST" action="{{ route('clerkbapplicationregister') }}">
                              @csrf
                            <div class="form-group row showcase_row_area">
                                <div class="col-md-3 showcase_text_area">
                                  <label for="email">Developer Email</label>
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
                                  <label for="appnumber">APPLICATION NUMBER</label>
                                </div>
                                <div class="col-md-9 showcase_content_area">
                                  <input type="text" class="form-control  @error('appnumber') is-invalid @enderror" name="appnumber" value="{{ old('appnumber') }}" id="appnumber" required aria-disabled="true" readonly="readonly">
                                  @error('appnumber')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                  <button class="btn btn-primary" id="generatappno">Generate</button>
                                </div>
                              </div>

                              
                              <div class="form-group row showcase_row_area">
                                  <div class="col-md-3 showcase_text_area">
                                    <label for="superzone">SUPER ZONE </label>
                                  </div>
                                  <div class="col-md-9 showcase_content_area">
                                      <select class="custom-select" id="superzone" name="superzone">
                                          <option value="0">Select super zone</option>
                                          @foreach($super_zones as $super_zone)
                                            <option value="{{$super_zone->id}}">{{$super_zone->name}}</option>
                                          @endforeach
                                      </select>
                                      @error('superzone')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                </div>

                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                      <label for="zone">ZONE </label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <select class="custom-select" id="zone" name="zone">
                                            
                                                                      
            
                                        </select>
                                        @error('zone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                  </div>

                                  <div class="form-group row showcase_row_area">
                                      <div class="col-md-3 showcase_text_area">
                                        <label for="village">VILLAGE  </label>
                                      </div>
                                      <div class="col-md-9 showcase_content_area">
                                          <select class="custom-select" id="village" name="village">                          
              
                                          </select>
                                          @error('village')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                    </div>

                                
                                
  
                           
  
                        
                        <div class="form-group row showcase_row_area">
                            <div class="col-md-3 showcase_text_area">
                              <label for="filenumber">FILE NUMBER</label>
                            </div>
                            <div class="col-md-9 showcase_content_area">
                              <input type="text" class="form-control  @error('filenumber') is-invalid @enderror" name="filenumber" value="{{ old('filenumber') }}" id="filenumber" required aria-disabled="true" readonly="readonly">
                              @error('filenumber')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                              <button class="btn btn-primary" id="generatefilenumber">Generate File Number</button>
                            </div>
                        </div>

                         <div class="form-group row showcase_row_area">
                                  <div class="col-md-3 showcase_text_area">
                                    <label for="buildingheight">App Buiding Height</label>
                                  </div>
                                  <div class="col-md-9 showcase_content_area">
                                      <select class="custom-select" id="buildingheight" name="buildingheight">
                                          <option value="0">Select building height</option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                          <option value="6">6</option>
                                          <option value="7">7</option>
                                          <option value="8">8</option>
                                          <option value="9">9</option>
                                          <option value="10">10</option>
                                         
                                      </select>
                                      @error('buildingheight')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                </div>


                                <div class="form-group row showcase_row_area">
                                  <div class="col-md-3 showcase_text_area">
                                    <label for="buildingtype">App Buiding Type</label>
                                  </div>
                                  <div class="col-md-9 showcase_content_area">
                                      <select class="custom-select" id="buildingtype" name="buildingtype">
                                          <option value="0">Select building type</option>
                                          <option value="Residential">Residential</option>
                                          <option value="Commercial">Commercial</option>
                                          <option value="Residential/Commercial">Residential/Commercial</option>
                                          <option value="Institutional">Institutional</option>
                                         
                                      </select>
                                      @error('buildingtype')
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
                                      <button type="submit" class="btn btn-sm btn-primary"> Submit Building Application</button>
                                    
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
              <script>
                  jQuery(document).ready(function(){
                     jQuery('#generatappno').click(function(e){
                        e.preventDefault();
                        $.ajaxSetup({
                           headers: {
                               'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                           }
                       });
                        jQuery.ajax({
                           url: "{{ url('/generate/appno') }}",
                           method: 'get',
                           success: function(result){
                             $('#appnumber').val(result);
                              console.log(result);
                           }});
                      });

                      $("#superzone").change(function(e){
                          var szone=$('#superzone').val();
                          console.log(szone);
                         
                         
                          $.get("/get/file/zones"+"/"+szone,{ dataType: 'json'}, function(result, status){
                               
                                
                                if (result != undefined || result.length != 0) {
                                     $("#zone").empty();
                                     $("#zone").append("<option value='0'>Select zone</option>");
                                     result.forEach(function(zone){
                                      
                                       $("#zone").append("<option value='"+zone.id+"'>"+zone.zone_name+"</option>");
                                     });
                                }
                          });
                      });

                      $("#zone").change(function(e){
                          var zone=$('#zone').val();
                          console.log(zone);
                         
                        
                          $.get("/get/file/villages"+"/"+zone,{ dataType: 'json'}, function(result, status){
                               
                                
                                if (result != undefined || result.length != 0) {
                                    $("#village").empty();
                                    $("#village").append("<option value='0'>Select Village</option>");
                                    result.forEach(function(village){
                                      
                                      $("#village").append("<option value='"+village.id+"'>"+village.village_name+"</option>");
                                    });
                                }
                          });
                      });

                      $('#generatefilenumber').click(function(e){
                          e.preventDefault();
                          var szone=$('#superzone').val();
                          var zone=$('#zone').val();
                          var village=$("#village").val();
                          var appnumber=$('#appnumber').val();
                          jQuery.ajax({
                            url: "{{ url('/generate/fileno') }}"+"/"+szone+"/"+zone+"/"+village+"/"+appnumber,
                            method: 'get',
                            success: function(result){
                              $('#filenumber').val(result);
                              console.log(result);
                          }});
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