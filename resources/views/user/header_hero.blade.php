<section class="rts__banner overflow-hidden rts__section home__three__banner ">
    <div class="rts__banner__background">
    </div>
    <div class="container">
        <div class="row">
            <div
                class="rts__banner__wrapper d-flex flex-wrap flex-lg-nowrap gap-5 justify-content-between align-items-center">
                <div class="rts__banner__content max-750">
                    <h3 class="rts__banner__title  custom_titles wow animated fadeInUp ">
                        Your &nbsp Data, Your &nbsp Story, Your &nbsp Impact
                    </h3>
                    <p class="rts__banner__desc my-40 br-lg-none  wow animated fadeInUp">
                        Show the world what your data can do. Share your projects, insights, and <br>
                        analytics expertise to attract collaboration and career-defining opportunities.
                    </p>

                    <div></div>
                    @if(Auth::user())
                    
                    @else
                    <a href="/user-register" class="rts__btn pricing__btn rounded-5 he-4 fill__btn mb-40 text-white">Create My Profile</a>
                    @endif

                </div>

                <div class="rts__banner__image position-relative">
                    <figure class="banner__image">
                        <img src="{{ asset('assets/img/home-3/banner/man2.png') }}" alt="banner">
                    </figure>
                    <!-- <div class="banner__image__shape">
                        <div class="facebook">
                            <i class="fab fa-linkedin"></i>
                        </div>
                        <div class="twitter">
                            <i class="fab fa-twitter"></i>
                        </div>
                        <div class="linkedin">
                            <i class="fab fa-linkedin-in"></i>
                        </div>
                    </div> -->
                    <!-- <div class="current__job d-flex gap-3">
                        <div class="rts__icon">
                            <img src="{{ asset('assets/img/icon/job.svg') }}" alt="">
                        </div>
                        <div class="rts__text">
                            <span class="h5 mb-0">100+</span>
                            <span>Online New Job</span>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
