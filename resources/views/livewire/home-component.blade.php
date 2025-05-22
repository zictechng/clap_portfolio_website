
@include('user.header_hero')

<!-- job category -->
<div class="rts__section home_pages overflow-hidden section__padding">
    <div class="container">
        <div class="row justify-content-between gap-4 position-relative mtn-1">
            <div class="col-xl-6 col-lg-10">
                <!-- <div class="rts__section__content text-start wow animated fadeInUp">
                    <h6 class="rts__section__title section__mb">Browse &nbsp;Project &nbsp;Catalogs</h6>
                    <p class="rts__section__desc">Looking for your next experienced developer. Look no further</p>
                </div> -->
            </div>
            {{-- <div
                class="rts__slider__control style-gray pe-0 style__two__control align-items-end position-relative
                position-md-absolute right-md-0 bottom-md-0 z-3 d-flex gap-2 max-contnet">
                <div class="rts__slide__next slider__btn"><i class="fa-sharp fa-solid fa-chevron-left"></i></div>
                <div class="rts__slide__prev slider__btn"><i class="fa-sharp fa-solid fa-chevron-right"></i></div>
            </div> --}}
                @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" role="alert">
                    {{Session::get('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert" role="alert">
                    <strong>Whoops!</strong> There were some problems with your input:
                    <ul class="list-disc list-inside mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

            @if($hero_project->count())
            <div class="row justify-content-center">
                <div class="col-lg-11">

                    <div class="rts__testimonial__active overflow-hidden swiper-data swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden" data-swiper="{
                        &quot;slidesPerView&quot;: 1,
                        &quot;autoplay&quot;: false,
                        &quot;loop&quot;: true,
                        &quot;navigation&quot;: {
                            &quot;nextEl&quot;: &quot;.rts__slide__next&quot;,
                            &quot;prevEl&quot;: &quot;.rts__slide__prev&quot;}}">

                        <div class="swiper-wrapper" id="swiper-wrapper-41081825e32387d44" aria-live="off" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                            {{--  --}}
                            @foreach($hero_project as $projects)
                            <div class="swiper-slide swiper-slide-next swiper-slide-duplicate-prev" data-swiper-slide-index="0" style="width: 816px; margin-right: 30px;" role="group" aria-label="1 / 2">
                                <div class="rts__single__testimonial text-center">

                                    <div class="testimonial__text">
                                        <div class="col-lg-12 ">
                                            <div class="rts__job__card rounded-2 style__four style__gradient flex-wrap justify-content-between d-flex gap-4 align-items-center">
                                                <div class="d-flex flex-wrap flex-md-nowrap flex-lg-wrap flex-xl-nowrap gap-4 align-items-center">
                                                    <a href="{{ route('project.details', ['slug' => $projects->project_slug]) }}"><div class="rounded_image">
                                                        @if(!empty($projects->project_image) && file_exists(public_path('project_images/' . $projects->project_image)))
                                                            <img src="{{ asset('project_images/' . $projects->project_image) }}" alt="{{ $projects->project_title }}" style="width: 550px; height: 220px; border-radius: 8px">
                                                        @else
                                                            <img src="{{ asset('dashboardAsset/images/profile_pics.png') }}" alt="Project Default Image" style="width: 550px; height: auto; border-radius: 8px">
                                                        @endif

                                                    </div>
                                                    </a>
                                                    <div class="job__meta custom_job_title_wrapers w-100 d-flex flex-column gap-2">
                                                        <div class="d-flex justify-content-between align-items-center gap-3">
                                                            <a href="{{ route('project.details', ['slug' => $projects?->project_slug]) }}" class="job__title custom_job_titles h6 mb-0">{{ $projects->project_title ?? 'No Title' }}</a>
                                                        </div>
                                                        <div class="d-flex gap-3 gap-md-4 flex-wrap mb-2">
                                                            <p class="wow  fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                                                                {{ Str::limit($projects->project_description ?? 'No Description', 450, '...' )}}</p>
                                                        </div>

                                                        <div class="clearfix slide_flex">
                                                            <div class="float-start">
                                                                <div class="d-flex flex-wrap gap-4 my-3">
                                                                    <div style="float:left"><p class="d-flex gap-1 align-items-center"><i class="bi bi-heart"></i> {{ format_count($projects->like_count) }}
                                                                    </p>
                                                                    </div>
                                                                    <div style="float:left"><p class="d-flex gap-1 align-items-center"><i class="bi bi-chat"></i> {{ format_count($projects->comment_count) }}
                                                                    </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                <div class="float-end"><div class="blog__meta__info d-flex gap-3 my-3">
                                                                    <a href="#" class="d-flex gap-1 align-items-center float-end">
                                                                        @if(!empty($projects->user->profile_url) && file_exists(public_path('profile_images/' . $projects->user->profile_url)))
                                                                        <img class="rounded" src="{{ asset('profile_images/' . $projects->user->profile_url) }}" alt="{{ $projects->user->name }}" style="width: 28px; height: 28px;">
                                                                        @else
                                                                            <i class="bi bi-person-circle" style="font-size: 2rem; color: #7d8087;" width="30px"></i>
                                                                        @endif

                                                                        <div class="author__content author_admins text-start">
                                                                            <span class="h6">{{ Str::limit($projects->user->name ?? 'Unknown', 15, '...') }}</span>
                                                                            <p></p>
                                                                        </div>
                                                                    </a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                      </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @endforeach
                            </div>

                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>

                </div>
            </div>

                <div class="rts__slider__control d-lg-flex justify-content-between g-0 position-absolute top-50  translate-middle-y d-none">
                    <div class="rts__slide__next slider__btn" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-41081825e32387d44">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                        <path d="M11.1647 6.91797L4.08301 13.9996L11.1647 21.0813M23.9163 13.9996H4.28134" stroke="#292D32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    </div>
                    <div class="rts__slide__prev slider__btn" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-41081825e32387d44">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                    <path d="M16.8347 6.91797L23.9163 13.9996L16.8347 21.0813M4.08301 13.9996H23.718" stroke="#292D32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    </div>
                </div>
            </div>
            @else
        <p class="text-center text-gray-500">No feature project.</p>
    @endif

        </div>

    </div>
</div>
<!-- job category end -->

<div class="rts__section section__padding main_page_background">
    <div class="container">
    <div class="max-content  wow animated fadeInUp">
        <form action="#" class="d-flex align-items-center flex-wrap flex-md-nowrap flex-lg-wrap flex-xl-nowrap gap-4 justify-content-between">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                             <select class="form-select" id="additional-selection">
                                <option selected>Trending</option>
                                <option value="1">Data Mining</option>
                                <option value="2">Data Analytics</option>
                                <option value="3">Full Stack Development</option>
                            </select>
                        </div>

                        <!-- Search Input 2 -->
                        <div class="col-md-7 mx-auto">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Search Projects">
                              </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
        <!-- <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-10">
                <div class="rts__section__content text-center wow animated fadeIn mb-60"> -->
                    <!-- <h3 class="rts__section__title section__mb">Read Our Latest News</h3>
                    <p class="rts__section__desc">Looking for your next career opportunity. Look no further</p> -->
                <!-- </div>
            </div>
        </div> -->
        @if($project_data->count())
        <div class="row justify-content-center justify-content-lg-start g-30 improved__blog">
            @foreach($project_data as $project)
            <div class="col-lg-6 col-xl-4 col-md-10">
                <div class="rts__single__blog item_page_background">
                    <a href="{{ route('project.details', ['slug' => $projects->project_slug]) }}" class="blog__img">
                        @if(!empty($project->project_image) && file_exists(public_path('project_images/' . $project->project_image)))
                        <img src="{{ asset('project_images/' . $project->project_image) }}" alt="{{ $project->project_title }}" style="width: 400px; height: 200px; border-radius: 8px">
                    @else
                        <img src="{{ asset('dashboardAsset/images/profile_pics.png') }}" alt="Project Default Image" style="width: 400; height: 200px;">
                    @endif
                    </a>
                    <div class="blog__meta">

                        <a href="{{ route('project.details', ['slug' => $projects->project_slug]) }}" class="h6 fw-semibold">
                            {{ $project->project_title ?? 'No Title' }}
                        </a>
                        <div class="blog__meta__info d-flex gap-3 my-3">
                            <span class="d-flex gap-1 align-items-center"> <i class="bi bi-heart"></i> {{ format_count($project->like_count) }}
                            </span>
                            <a href="#" class="d-flex gap-1 align-items-center"><i class="bi bi-chat"></i> {{ format_count($project->comment_count) }}
                            </a>

                            @php
                                $hashid = \Vinkla\Hashids\Facades\Hashids::encode($project->user->id);
                            @endphp

                            <a href="{{ route('user.profile', ['user' => $hashid]) }}" class="d-flex gap-1 align-items-center">
                                @if(!empty($project->user->profile_url) && file_exists(public_path('profile_images/' . $project->user->profile_url)))
                                <img class="rounded" src="{{ asset('profile_images/' . $project->user->profile_url) }}" alt="{{ $project->user->name }}" style="width: 28px; height: 28px;">
                                @else
                                    <i class="bi bi-person-circle" style="font-size: 2rem; color: #7d8087;" width="30px"></i>
                                @endif

                                {{ Str::limit($project->user->name ?? 'Unknown', 15, '...') }} <img src="{{asset('assets/image/check.png')}}" alt="" srcset=""></a>
                        </div>
                        <!-- <a href="#" class="readmore__btn d-flex mt-3 gap-2 align-items-center">
                            View Project <i class="fa-light fa-arrow-right"></i></a> -->
                    </div>
                </div>
            </div>
            @endforeach
        </div>

            @if ($project_data->hasMorePages())
                <div class="d-flex justify-content-center mt-4">
                    <a href="{{ $project_data->nextPageUrl() }}" id="load-more-btn" class="btn btn-outline-primary rounded-5 px-4 py-2">
                        Load more projects
                    </a>
                </div>
            @endif

        @else
            <p class="text-center text-gray-500">No project found at the moment.</p>
        @endif
    </div>
</div>
<!-- Main Body section end -->

{{-- @include('user.download_app') --}}
