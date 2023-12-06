<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('pageTitle')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/template/assets/img/favicon/favicon.ico') }}" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/css/rtl/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('/template/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('/template/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('/template/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('/template/assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @yield('sidebarAdmin')

            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                @yield('navbarAdmin')

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <!-- Main Content -->
                            @yield('mainContentAdmin')
                            <!-- /Main Content -->

                            <!-- Footer -->
                            @yield('footerAdmin')
                            <!-- / Footer -->

                            <div class="content-backdrop fade"></div>
                        </div>
                        <!-- Content wrapper -->
                    </div>
                    <!-- / Layout page -->
                </div>

                <!-- Overlay -->
                <div class="layout-overlay layout-menu-toggle"></div>

                <!-- Drag Target Area To SlideIn Menu On Small Screens -->
                <div class="drag-target"></div>
            </div>
            <!-- / Layout wrapper -->

            <!-- Core JS -->
            <!-- build:js assets/vendor/js/core.js -->
            <script src="{{ asset('/template/assets/vendor/libs/jquery/jquery.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/popper/popper.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/js/bootstrap.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/node-waves/node-waves.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/hammer/hammer.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/i18n/i18n.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/select2/select2.js') }}"></script>

            <script src="{{ asset('/template/assets/vendor/js/menu.js') }}"></script>
            <!-- endbuild -->

            <!-- Vendors JS -->
            <script src="{{ asset('/template/assets/vendor/libs/masonry/masonry.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}">
            </script>
            <script
                src="{{ asset('/template/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}">
            </script>
            <script src="{{ asset('/template/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
            </script>


            <!-- Main JS -->
            <script src="{{ asset('/template/assets/js/main.js') }}"></script>

            <!-- Page Js -->

            <!-- dataTable -->
            <script>
                $('#myTable').dataTable({});
            </script>

            @if (session()->has('success'))
            <script>
            //     Swal.fire({
            //     title: "Succes",
            //     text: "{{ session('success') }}",
            //     icon: "success",
            // });
            Swal.fire({
            icon: "success",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
            });
            </script>
            @endif


</body>

</html>