<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- ajax csrf token  --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ url('Admin/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ url('Admin/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ url('Admin/vendors/feather/feather.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ url('Admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ url('Admin/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('Admin/js/select.dataTables.min.css') }}">
  <link rel="stylesheet" href="{{ url('Admin/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">

  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ url('Admin/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ url('Admin/images/favicon.png') }}" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('admin.layout.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      @include('admin.layout.setting_bar')
     @include('admin.layout.right_sidebar')
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
     @include('admin.layout.sidebar')
      <!-- partial -->
      <div class="main-panel">
       @yield('content')
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin.layout.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ url('Admin/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ url('Admin/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ url('Admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ url('Admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ url('Admin/js/dataTables.select.min.js') }}"></script>
  
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ url('Admin/js/off-canvas.js') }}"></script>
    <script src="{{ url('Admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ url('Admin/js/template.js') }}"></script>
    <script src="{{ url('Admin/js/settings.js') }}"></script>
    <script src="{{ url('Admin/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ url('Admin/js/dashboard.js') }}"></script>
    <script src="{{ url('Admin/js/Chart.roundedBarCharts.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <!-- End custom js for this page-->
   <!-- sweet alert js -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  {{-- admin custom js --}}
  <script src="{{ url('Admin/js/admin_custom.js') }}"></script>
</body>

</html>

