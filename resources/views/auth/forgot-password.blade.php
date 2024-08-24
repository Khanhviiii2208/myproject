{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Quên Mật khẩu? Không vấn đề gì. Chỉ cần cho chúng tôi biết địa chỉ email của bạn và chúng tôi sẽ gửi email cho bạn một liên kết đặt lại mật khẩu cho phép bạn chọn một liên kết mới.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Gửi liên kết đặt lại mật khẩu email') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quên mật khẩu</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
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
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Quên Mật khẩu? Không vấn đề gì. Chỉ cần cho chúng tôi biết địa chỉ email của bạn và chúng tôi sẽ gửi email cho bạn một liên kết đặt lại mật khẩu cho phép bạn chọn một liên kết mới.') }}
                </div>
            
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
            
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
            
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <div class="flex items-center justify-end mt-4 ">
                        <x-primary-button class="bg-primary">
                            {{ __('Gửi liên kết đặt lại mật khẩu email') }}
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