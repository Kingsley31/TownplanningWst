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
    

    <style>
            .invoice {
              width: 100%;
              
              /* border: 1px solid black; */
              background: white;
              /* border-radius: 5px; */
              text-transform: uppercase;
            }
            .firstheader h1 {
              font-family: Arial, Helvetica, sans-serif;
              text-align: center;
              font-weight: bold;
              font-size: 3em;
            }
            .secondheader h1 {
              font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
              color: green;
              text-transform: capitalize;
              text-align: center;
            }
            .refsection {
              float: left;
              margin-left: 5px;
            }
            .logosection {
             float : left;
            }
            .logosection img {
              width: 30%;
              margin-left: 30%;
              margin-right:30%;
            }
            .topmidsection {
              position: relative;
              top: 20px;
            }
            .addresssection {
              float: right;
              position: relative;
              /* top: 20px; */
              margin-right: 5px;
            }
            .addresssection {
              line-height: 30px;
            }
            .clear {
              clear: both;
            }
            .interimsection {
              border: 3px solid darkgreen;
              border-radius: 5px;
              margin-top : 15px;
            }
            .mainfooter {
              background: darkgreen;
              padding: 10px;
              color: #f9f9f9;
              display: block;
              width: 100%;
              text-align : center;
              font-weight: bold;
              font-size: 2em;
              
            }
            .footertopdesign {
              background: darkgreen;
              border-bottom: 2px solid white;
              width: 100%;
              height: 8px;
            }
            .firstfooter {
              margin: 10px ;
              padding: 20px;
            }
            .leftsign {
              float: left;
              line-height: 3;
              
            }
            .rightsign {
              float: right;
              overflow: hidden;
              clear: right;
            }
            .rightsign p {
              line-height: 5;
              
            }
            .rightsign h3 {
              font-size : 1em;
              margin-top: -10px;        
            }
            .interimsection h1 {
              text-align: center;
            }
            .interimsection h3 {
              font-size : 1em;
              margin-left: 30px;
              line-height : 3;
            }
            .interimsection p {
             
              margin-left: 30px;
              text-align: justify;
              
            }
            @media print {
              body * { visibility : hidden;}
              .invoice * { visibility : visible;}
              .invoice { position : absolute; top : 10px; left: 0px; right: 10px;}
            }
          </style>
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
            <h6 class="display-income">HEAD OF ADMIN</h6>
          </div>
        </div>
        <ul class="navigation-menu">
            <li>
                <a href="{{ route('hoadashboard') }}">
                    <span class="link-title">DASHBOARD</span>
                    <i class="mdi mdi-flask link-icon"></i>
                </a>
                
            </li>
            <li>
                <a href="{{ route('headofadminslp') }}">
                    <span class="link-title">SITE LOCATION PLAN</span>
                    <i class="mdi mdi-flask link-icon"></i>
                </a>
                
            </li>
            <li>
                <a href="{{ route('headofadminchecklist') }}">
                    <span class="link-title">CHECKLIST</span>
                    <i class="mdi mdi-flask link-icon"></i>
                </a>
                
            </li>
            <li class="nav-category-divider">
                <a href="{{ route('headofadminidpa') }}">
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


               <div class="invoice">

                 <div class="firstheader">
                   <h1>Government of Abia State</h1>
                 </div>
                 
                 <div class="secondheader">
                   <h1>OSISIOMA NGWA TOWN PLANNING AUTHORITY, OSISIOMA</h1>
                   
                 </div>

                 <div class="topmidsection">
                   <div class="refsection">

                     <h3>Our Ref................................</h3>
                     <h3>Your Ref................................</h3>

                    



                   </div>
                   <div class="logosection">

                     <img src="{{asset('assets/images/arrm.jpg')}}">

                   </div>
                   <div class="addresssection">
                       <p>Telephone: 08128008305</p>
                       <p>Email: osntpa2011@yahoo.com</p>
                       <p>Website: osntpa.org</p>
                       <p>Date: {{now()->toDateString()}}</p>
                   </div>

                 </div>

                 <div class="clear"></div>

                 <div class="interimsection">


                   <h1>INTERIM DEVELOPMENT PERMIT</h1>

                    <h3>Sir/Madam</h3>

                     <h3>BUILDING PLAN REGISTRATION NO: <span>OSNTPA/BP : </span> <b>{{$application->file_no}}</b></h3>
                     <h3>BUILDING PLAN APPROVAL NO: <span>OSNTPA/BP</span> <b>{{$application->file_no}}</b></h3>
                     <h3>IN FAVOUR OF <b>{{$application->developer->lastname}} {{$application->developer->firstname}}</b></h3>

                     <H3>LOCATION........................................................................</H3>


                     <p>I refer to your application dated <b>{{$application->created_at->toDateString()}}</b> in respect of the above named
                       Matter and return herewith two sets/copies of your approved building plan registered as 

                     </p>

                     <p style="font-weight: bold; padding-top: 5px; padding-bottom: 5px;">OSNTPA/BP/{{$application->file_no}}</p>


                     


                     <p>In approving these building plans, the OSISIOMAN NGWA TOWN PLANNING AUTHORITY wishes to draw attention to the following: </p>


         <ul>


<li>Approval of your plans in no way grants or implies any right of occupancy</li>
<li>Approval is grant without prejudices to any matter on the issues of TITLE/RIGHT over the said property pending or intended for determination in any court of law. </li>

<li>Approval receives the right to cancel this approval in favour of future carnation in planning standards or due to extinction/revocation of your 
TITLE right over the verdicts or as other reasonable circumstances may compel. </li>



<li> The development shall remain vailid for two years from the date of communication of the approval of the development permit to the developer and </li>
<li> Where a developer fails to commence development  within two years, the development permit sahll be subject to REVALIDATION by the Authority, which issued
the original permiton payment of prescribed appropriate fees for the time being. </li>
<li> Failure to develop in accordance with the plans as approved shall render the development VOID and thus cancelled and withdrwa without NOTICE by the Authority. </li>
</ul>
<ol>

<li> You may now apply to commence your building: Work should begin after you have received a Certificate of Commencement from this Authority (Stages Permit). 
This will be issued after the site of your proposed
building has been inspected following your pegging.</li>

<li>On no condition shall the foundation trenches by back filled or the building carries beyond the damp proof course without inspection by this Authority and approval given is 
written by the Authority for the building to continue. The staged permit must be signed in each case. </li>

<li> During Construction, your building MUST be open for inspection by the Authority's staff. A copy of your approved building MUST be available for inspection at all times during working hours. </li>

<li>You have already pad for inspection your premise for purpose of issuing a Certificate of Fitness which empowers tenants to move into the house. You would ensure 
that your building is thus inspected on completion. </li>

<li> You will acknowledge receipt of this letter by signing the Certificate cum and undertaking attached to this letter and return it to this office without delay.</li>

</ol>

<div class="firstfooter">

<div class="leftsign">
<P>---------------------------------<P>
<P>---------------------------------<P>
<P>---------------------------------<P>

</div>


<div class="rightsign">

<p>Yours Obediently, </p>

<img src="/signatures/{{$signature->signature_path}}">
<p>Executive Secretary</p>
<h3>OSISIOMA NGWA TOWN PLANNING AUTHORITY</h3>
</div>
</div>
                   
<div class="clear"></div>

</div>
         




<div class="footertopdesign"></div>
<div class="mainfooter">
PLANNING PERMIT IS THE LEGAL BASIS FOR ALL DEVELOPMENTS
</div>

</div>


<button class="btn btn-success btn-block" id="print_invoice">Print Document</button>








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
    <script>
        $(document).ready(function() {
            $('#print_invoice').click(function() {
            window.print();
            });
            
        });
        
    </script>
  </body>
</html>