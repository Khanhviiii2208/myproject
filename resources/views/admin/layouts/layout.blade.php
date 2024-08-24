{{-- <!DOCTYPE html>
<html lang="en"> --}}
<!DOCTYPE html>
<html lang="en">
  <style>
          .kv-2{
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1; /* Giới hạn số dòng là 2 */
            overflow: hidden;
            text-overflow: ellipsis;
        }
  </style>
@include('admin.layouts.components.head')
<body class="with-welcome-text">
    <div class="container-scroller">
    @include('admin.layouts.components.header')
   
     
      <div class="container-fluid page-body-wrapper">
    
        @include('admin.layouts.components.sidebar')
       
        @yield('content')
      
      </div>
   
    </div>
    @include('admin.layouts.components.footer')
    @include('admin.layouts.components.scripts')
    {{-- <script src="{{ asset('admin_assets/assets/vendors/js/vendor.bundle.base.js') }}"></script> --}}
    <script src="{{ asset('admin_assets/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('admin_assets/assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admin_assets/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/js/template.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/js/settings.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('admin_assets/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_assets/assets/js/dashboard.js') }}"></script>
</body>
</html>