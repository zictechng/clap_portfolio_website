<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
    <div class="offcanvas-header p-0 mb-5 mt-4">
        <a href="index-2.html" class="offcanvas-title" id="offcanvasLabel">
            <img src="{{asset('assets/img/logo/logo_black.png')}}" width="100" height="30" alt="logo">
        </a>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <!-- login offcanvas -->

    <div class="offcanvas-body p-0">
        <div class="rts__offcanvas__menu overflow-hidden">
            <div class="offcanvas__menu"></div>
        </div>
        <form method="POST" id="logout-userForm" action="{{route('logout')}}">
            @csrf
        </form>
        <div class="mb-4 d-block d-sm-none col-12">
            <div class="header__right__btn d-flex justify-content-center gap-3">
                <a href="{{route('logout')}}"
                    onclick="event.preventDefault(); document.getElementById('logout-userForm').submit();"
                    class="small__btn no__fill__btn border-6 rounded-5 font-xs">
                    <i class="rt-login"></i>
                    Logout
                </a>

            </div>
        </div>
        <p class="max-auto font-20 fw-medium text-center text-decoration-underline mt-4">Our Social Links</p>
        <div class="rts__social d-flex justify-content-center gap-3 mt-3">
            <a target="_blank" href="https://facebook.com/" aria-label="facebook">
                <i class="fa-brands fa-facebook"></i>
            </a>
            <a target="_blank" href="https://instagram.com/" aria-label="instagram">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a target="_blank" href="https://linkedin.com/" aria-label="linkedin">
                <i class="fa-brands fa-linkedin"></i>
            </a>

            <a target="_blank" href="https://youtube.com/" aria-label="youtube">
                <i class="fa-brands fa-youtube"></i>
            </a>
        </div>
    </div>
</div>
