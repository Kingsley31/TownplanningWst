<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Osisioma Town Planning Agency</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.addons.css') }}" />
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/shared/style.css') }}" />
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}">
    <!-- Layout style -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
  </head>
  <body>
    <div class="authentication-theme auth-style_1">
      <div class="row">
        <div class="col-12 logo-section">
          <a href="index.html" class="logo" style="color: #f9f9f9; font-size: 3rem; width: 100%; text-align: center;">
           OSISIOMA TOWN PLANNING AUTHORITY (OSNTPA)
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-5 col-md-7 col-sm-9 col-11 mx-auto">
          <div class="grid">
            <div class="grid-body">
              <div class="row">
                <div class="col-lg-7 col-md-8 col-sm-9 col-12 mx-auto form-wrapper">
                  <form method="POST" action="{{ route('tplogin') }}">
                    @csrf
                    <div class="form-group input-rounded">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-group input-rounded">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-inline">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>Remember me <i class="input-frame"></i>
                        </label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block"> Login </button>
                  </form>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="auth_footer">
        <p class="text-muted text-center">© PHETCHA CONSULTS 2019</p>
      </div>
    </div>
    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/core.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/vendor.addons.js') }}"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <!-- endbuild -->
  </body>
</html>