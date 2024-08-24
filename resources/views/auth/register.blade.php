<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng ký</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin_assets/assets/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('admin_assets/assets/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <h3>VANKIH</h3>
                </div>
                <h4>Chào mừng bạn đến với VANKIH</h4>
                <h6 class="fw-light">Đăng ký.</h6>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
            
                    <!-- Name -->
                    <div>
                        <x-text-input id="name" class="form-control form-control-lg" type="text" name="name" :value="old('name')"  autofocus autocomplete="name" placeholder="Tên" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
            
                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-text-input id="email" class="form-control form-control-lg" type="text" name="email" :value="old('email')"  autocomplete="username" placeholder="Email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <!-- Password -->
                    <div class="mt-4">
            
                        <x-text-input id="password" class="form-control form-control-lg"
                                        type="password"
                                        name="password"
                                        email autocomplete="new-password" 
                                        placeholder="Mật khẩu"/>
            
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
            
                    <!-- Confirm Password -->
                    <div class="mt-4">           
                        <x-text-input id="password_confirmation" class="form-control form-control-lg"
                                        type="password"
                                        name="password_confirmation"  autocomplete="new-password" 
                                        placeholder="Nhập lại mật khẩu"/>
            
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
            
                    <div class="flex items-center justify-end mt-4">
                        <a class="auth-link text-black" href="{{ route('login') }}">
                            {{ __('Đã có tài khoản?') }}
                        </a></br>
            
                        <x-primary-button class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">
                            {{ __('Đăng ký') }}
                        </x-primary-button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('admin_assets/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admin_assets/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/js/template.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/js/settings.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
  </body>
</html>