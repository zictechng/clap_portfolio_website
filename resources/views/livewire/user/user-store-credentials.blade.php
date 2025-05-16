    <!-- Sidebar -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- End of Sidebar -->
    @include('userDash_template.dash_siderBar')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
                @include('userDash_template.dash_topBar')
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
                @include('user.user_crd_store')
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
            @include('userDash_template.dash_footer')
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->