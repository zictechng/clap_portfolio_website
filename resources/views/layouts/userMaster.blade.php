
<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon-16x16.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('dashboardAsset/css/dashboardStyle.css')}}">
    <link rel="stylesheet" href="{{asset('dashboardAsset/css/responsive.css')}}">
    <title>Clap Academy - User Dashboard</title>
    <!-- Custom fonts for this template-->
    <link href="{{asset('user/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('user/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"  />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles
</head>

        <body id="page-top">

            <div id="wrapper">

            {{$slot}}

            </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to logout?.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="{{route('logout')}}"
                    onclick="event.preventDefault(); document.getElementById('logout-userForm').submit();">Logout</a>
                </div>
                <form method="POST" id="logout-userForm" action="{{route('logout')}}">
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('user/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('user/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('user/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('user/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('user/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('user/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('user/js/demo/chart-pie-demo.js')}}"></script>
    <script src="{{asset('dashboardAsset/js/script.js')}}"></script>
    @livewireScripts
</body>
</html>
