<footer class="rts__section  footer__home__three">
    <div class="container">
        <div class="row">
            <div
                class="footer__wrapper d-flex flex-wrap flex-column flex-sm-row gap-4 gap-md-0 gap-sm-3 justify-content-between pt-60 pb-60">
                <div class="text-white rts__footer__widget max-320">
                    <a href="index-2.html" class="footer__logo" aria-label="logo">
                        <img src="{{asset('assets/img/logo/logo_white.png')}}" width="120" height="40" alt="logo">
                    </a>
                    <p class="mt-4">Whether you're an experienced professional or a fresh graduate eager to dive
                        into the workforce, we have something for everyone.
                    </p>
                </div>

                <!-- footer menu -->
                <div class="text-white rts__footer__widget max-content">

                    <div class=" footer_title text-white font-20 fw-medium mb-3 h6">Links</div>
                    <ul class="list-unstyled footer_menu_list">
                        <li><a href="#" aria-label="footer__menu__link">Browse Projects</a></li>
                        <li><a href="#" aria-label="footer__menu__link">Blog & News</a></li>
                        <li><a href="#" aria-label="footer__menu__link">Testimonies</a></li>
                        <li><a href="#" aria-label="footer__menu__link">Privacy</a></li>
                        <li><a href="#" aria-label="footer__menu__link">Terms of Service</a></li>
                    </ul>
                </div>

                {{-- <div class="text-white rts__footer__widget max-content">
                    <div class="text-white font-20 fw-medium mb-3 h6 ">Contact Us</div>
                    <ul class="list-unstyled mb-3">
                        <li><a href="#"><i class="fa-light fa-location-dot"></i>2715 Ash Dr. San Jose,USA</a></li>
                        <li><a href="callto:+880171234578"><i class="fa-light fa-phone"></i>+(61) 545-432-234</a>
                        </li>
                        <li><a href="mailto:project@clapacademy.co.uk"><i class="fa-light fa-envelope"></i>
                                project@clapacademy.co.uk</a></li>
                    </ul>

                </div> --}}

                <!-- newsletter form -->
                <div class="rts__footer__widget max-320">
                    <div class="footer_title text-white font-20 fw-medium mb-20">Social Link</div>
                    <div class="rts__social d-flex gap-4 mb-30">
                        <a target="_blank" href="https://facebook.com/" aria-label="facebook">
                            <i class="fa-brands fa-facebook text-white"></i>
                        </a>
                        <a target="_blank" href="https://instagram.com/" aria-label="instagram">
                            <i class="fa-brands fa-instagram text-white"></i>
                        </a>
                        <a target="_blank" href="https://linkedin.com/" aria-label="linkedin">
                            <i class="fa-brands fa-linkedin text-white"></i>
                        </a>

                        <a target="_blank" href="https://youtube.com/" aria-label="youtube">
                            <i class="fa-brands fa-youtube text-white"></i>
                        </a>
                    </div>

                    <!-- <div class="text-white font-20 fw-medium mb-3 h6 ">Subscribe For Newsletter</div> -->
                    <p class="text-white br-sm-none">Don't miss out of our <br> unique project notifications</p>
                    <form action="{{route('user.subscriber')}}" method="POST">
                        @csrf
                    <div class="custom__input mt-4 mb-3">
                    <input type="text" name="phone_number" value="{{old('phone_number')}}" class="form-control" id="semail" placeholder="Your Phone no" required>
                    </div>
                    <div class="d-flex newsletter">
                        <input type="email" name="sub_email" value="{{old('sub_email')}}" id="semail" class="form-control" placeholder="Enter your email" required>
                        <button type="submit" class="rts__btn fill__btn">Subscribe</button>
                    </div>
                    </form>
                </div>
                <!-- newsletter form end -->

            </div>
        </div>
    </div>
    <hr class="new1">
    <div class="rts__copyright text-white">
        <div class="container">
            <p class="text-left fw-medium py-4 ">
                Copyright &copy; 2024 All Rights Reserved by Clap Academy
            </p>
        </div>
    </div>
</footer>
