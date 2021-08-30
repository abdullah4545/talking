<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Talking Admin Dashboard</title>
        <link rel="icon" href="{{asset('public/frontEnd/')}}/images/fav.png" type="image/png" sizes="16x16">
        <link href="{{ asset('public/admin/')}}/css/styles.css" rel="stylesheet" />
        <link href="{{ asset('public')}}/css/style.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <!-- bootstrap css for glyphicon-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    </head>
    <body class="sb-nav-fixed">

            <!--- Header --->
        @include('admin.includes.header')
            <!--- Header --->


        <div id="layoutSidenav">

                <!--- Side Bar --->
             @include('admin.includes.sideMenu')
                <!--- Side Bar --->

            <div id="layoutSidenav_content">

                    <!--- Admin Main Content --->
                @yield('adminMainContent')
                    <!--- Admin Main Content --->

                    <!--- footer --->
                @include('admin.includes.footer')
                    <!--- footer --->

            </div>
        </div>




        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('public/admin/')}}/js/scripts.js"></script>
        <!---frontend--->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('public/admin/')}}/js/chart-area-demo.js"></script>
        <script src="{{ asset('public/admin/')}}/js/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('public/admin/')}}/js/datatables-demo.js"></script>
        <script src="{{ asset('public/admin/js/') }}/main.js"></script>
    </body>
</html>
