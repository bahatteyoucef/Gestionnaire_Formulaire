<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    <!--  -->
    <link rel="stylesheet" href="{{url('css/mobileview.css')}}">
    <!--  -->
    
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{url('template/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{url('template/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{url('template/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('template/vendors/typicons/typicons.css')}}">
    <link rel="stylesheet" href="{{url('template/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{url('template/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="{{url('template/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}"> -->
    <link rel="stylesheet" href="{{url('template/js/select.dataTables.min.css')}}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{url('template/css/vertical-layout-light/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{url('template/images/favicon.png')}}" />

        <!-- plugins:js -->
        <script src="{{url('template/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{url('template/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{url('template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{url('template/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{url('template/js/off-canvas.js')}}"></script>
    <script src="{{url('template/js/hoverable-collapse.js')}}"></script>
    <script src="{{url('template/js/template.js')}}"></script>
    <script src="{{url('template/js/settings.js')}}"></script>
    <script src="{{url('template/js/todolist.js')}}"></script>
    <!-- endinject -->

    <!-- Custom js for this page-->
    <script src="{{url('template/js/dashboard.js')}}"></script>
    <script src="{{url('template/js/Chart.roundedBarCharts.js')}}"></script>
    <!-- End custom js for this page-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
        @include('template/navbar')
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">

            <!-- partial:partials/_settings-panel.html -->
            @include('template/setting')
            <!-- partial -->

            <!-- partial:partials/_sidebar.html -->
            @include('template/sidebar')
            <!-- partial -->

            <!-- main-panel -->
            <div class="main-panel">
                @yield('main_section')
                <!-- main-panel ends -->

                <!-- partial:partials/_footer.html -->
                @include('template/footer')
            </div>
            <!-- partial -->

        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

</body>

</html>