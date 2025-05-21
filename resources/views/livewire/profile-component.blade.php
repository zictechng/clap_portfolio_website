<div class="blank_banner">

</div>
<div class="main_section_for_profile_view">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="profile_card_areas">
                    <div class="profile_card">
                        <div class="profile_image">

                            @if(!empty($user_details?->profile_url) && file_exists(public_path('profile_images/' . $user_details?->profile_url)))
                        <img class="rounded" src="{{ asset('profile_images/' . $user_details?->profile_url) }}" alt="{{ $user_details?->name }}" style="width: 50px; height: 50px;">
                        @else
                            <i class="bi bi-person-circle" style="font-size: 4rem; color: #7d8087;" width="50px"></i>
                        @endif
                        </div>
                        <h4>{{$user_details->name.' '.$user_details->lname}}</h4>
                        <div class="social_link">
                            <ul>
                                <li>
                                    <a href="">
                                        <span>
                                            <img src="{{asset('assets/image/linkdin.png')}}" alt="" srcset="">
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span>
                                            <img src="{{asset('assets/image/github.png')}}" alt="" srcset="">
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="profile_faq">
                        <div class="faq_item">
                            <div class="faq_heading">
                                <h4>About </h4>
                                <span>
                                    <i class="fa-solid fa-angle-down"></i>
                                </span>
                            </div>
                            <div class="faq_content">
                                <p>
                                    {{$user_details->user_biography? :'No biography available'}}
                                </p>
                            </div>
                        </div>
                        <div class="faq_item">
                            <div class="faq_heading">
                                <h4>Certifications </h4>
                                <span>
                                    <i class="fa-solid fa-angle-down"></i>
                                </span>
                            </div>
                            <div class="faq_content">
                                <p>
                                    No certifications available
                                </p>

                            </div>
                        </div>
                        <div class="faq_item">
                            <div class="faq_heading">
                                <h4>Education </h4>
                                <span>
                                    <i class="fa-solid fa-angle-down"></i>
                                </span>
                            </div>
                            <div class="faq_content">
                                @forelse ($education as $educations)
                                <p>
                                    Text goes here
                                </p>
                                @empty
                                <p>
                                    No education available
                                </p>
                                @endforelse
                            </div>
                        </div>
                        <div class="faq_item">
                            <div class="faq_heading">
                                <h4>Work Experience </h4>
                                <span>
                                    <i class="fa-solid fa-angle-down"></i>
                                </span>
                            </div>
                            <div class="faq_content">
                                @forelse ($work_experience as $work_experiences)
                                <p>
                                    Text goes here
                                </p>
                                @empty
                                <p>
                                    No work experience available
                                </p>
                                @endforelse
                            </div>
                        </div>
                        <div class="faq_item">
                            <div class="faq_heading">
                                <h4>Additional links </h4>
                                <span>
                                    <i class="fa-solid fa-angle-down"></i>
                                </span>
                            </div>
                            <div class="faq_content">
                                <p>
                                    {{$user_details->web_link? :'No additional link available'}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="profile_column_wrapers_sections">
                    <div class="filter_btns_section mb-4 d-flex align-items-center gap-3">
                        <button class="active_btns list_buttons">Projects</button>
                        <button class="grid_buttons">Top Performing</button>
                    </div>
                    <!----------------------------------------post section---------------------------------->
                    @if($projects->count())
                    <div class="project_wrapers box_list">
                        @foreach ($projects as $project_data)

                        <div class="project_card_item d-flex gap-3">
                            <div class="project_image">
                                <a href="{{ route('project.details', ['slug' => $project_data->project_slug]) }}" class="blog__img">
                                    @if(!empty($project_data->project_image) && file_exists(public_path('project_images/' . $project_data->project_image)))
                                    <img src="{{ asset('project_images/' . $project_data->project_image) }}" alt="{{ $project_data->project_title }}" style="width: 185px; height: 150px; border-radius: 8px">
                                @else
                                    <img src="{{ asset('dashboardAsset/images/profile_pics.png') }}" alt="Project Default Image" style="width: 185px; height: 150px;">
                                @endif
                                </a>
                            </div>
                            <div class="project_content">
                                <h4><a href="{{ route('project.details', ['slug' => $project_data->project_slug]) }}" style="color: black">{{$project_data->project_title}}</a></h4>
                                <p>
                                    {{ Str::limit($project_data->project_description ?? 'Description', 150, '...') }}
                                </p>
                                <div class="project_author_tools">
                                    <div class="project_author_section d-flex align-items-center justify-content-space-between gap-3">
                                        <div class="activity_ber d-flex align-items-center gap-2">
                                            <a href="#">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.80638 6.20757C4.70651 5.30771 5.92719 4.8022 7.19998 4.8022C8.47276 4.8022 9.69344 5.30771 10.5936 6.20757L12 7.61277L13.4064 6.20757C13.8492 5.74912 14.3788 5.38345 14.9644 5.13188C15.5501 4.88032 16.1799 4.74791 16.8172 4.74237C17.4546 4.73683 18.0866 4.85828 18.6766 5.09963C19.2665 5.34098 19.8024 5.69739 20.2531 6.14807C20.7038 6.59876 21.0602 7.13469 21.3015 7.72459C21.5429 8.31449 21.6643 8.94656 21.6588 9.5839C21.6532 10.2212 21.5208 10.8511 21.2693 11.4367C21.0177 12.0223 20.652 12.552 20.1936 12.9948L12 21.1896L3.80638 12.9948C2.90651 12.0946 2.401 10.874 2.401 9.60117C2.401 8.32838 2.90651 7.1077 3.80638 6.20757V6.20757Z" stroke="#202020" stroke-width="2" stroke-linejoin="round"/>
                                                      </svg>
                                                      {{ format_count($project_data->like_count) }}
                                                </span>
                                            </a>
                                            <a href="#">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M20.2338 15.6356C20.7253 14.5238 20.9983 13.2938 20.9983 12C20.9983 7.02944 16.9692 3 11.9991 3C7.02906 3 3 7.02944 3 12C3 16.9706 7.02906 21 11.9991 21C13.5993 21 15.1019 20.5823 16.4039 19.85L21 20.9991L20.2338 15.6356Z" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                      </svg>
                                                      {{ format_count($project_data->comment_count) }}
                                                </span>
                                            </a>
                                        </div>
                                        <div class="user_profile d-flex align-items-center gap-3">
                                            <div class="user_image">
                                                @if(!empty($project_data?->user->profile_url) && file_exists(public_path('profile_images/' . $project_data?->user->profile_url)))
                                                    <img class="rounded" src="{{ asset('profile_images/' . $project_data?->user->profile_url) }}" alt="{{ $project_data?->user->name }}" style="width: 28px; height: 28px;">
                                                    @else
                                                        <i class="bi bi-person-circle" style="font-size: 2rem; color: #7d8087;" width="30px"></i>
                                                    @endif
                                            </div>
                                            <div class="user_details">
                                                <h4>{{ Str::limit($project_data->user->name .' '. $project_data->user->lname ?? 'Unknown', 20, '...') }}</h4>
                                            </div>
                                            <div class="user_check">
                                                <img src="{{asset('assets/image/check.png')}}" alt="" srcset="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p class="text-center text-gray-500">No project found at the moment.</p>
                    @endif
                    <!------------------------------------Grid item ------------------------------------>
                    <div class="project_wrapers box_grid" style="display: none;">
                            <div class="row">
                                <div class="col-lg-6 col-6">
                                    <div class="project_card_item d-flex gap-3">
                                        <div class="project_image">
                                            <a href="{{ route('project.details', ['slug' => $project_data->project_slug]) }}" class="blog__img">
                                                @if(!empty($project_data->project_image) && file_exists(public_path('project_images/' . $project_data->project_image)))
                                                <img src="{{ asset('project_images/' . $project_data->project_image) }}" alt="{{ $project_data->project_title }}" style="width: 185px; height: 150px";>
                                            @else
                                                <img src="{{ asset('dashboardAsset/images/profile_pics.png') }}" alt="Project Default Image" style="width: 185px; height: 150px;">
                                            @endif
                                            </a>
                                        </div>
                                        <div class="project_content">
                                            <h4><a href="{{ route('project.details', ['slug' => $project_data->project_slug]) }}" style="color: black">{{$project_data->project_title}}</a></h4>
                                            <p>
                                                {{ Str::limit($project_data->project_description ?? 'Description', 150, '...') }}
                                            </p>
                                            <div class="project_author_tools">
                                                <div class="project_author_section d-flex align-items-center justify-content-space-between gap-3">
                                                    <div class="activity_ber d-flex align-items-center gap-2">
                                                        <a href="">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.80638 6.20757C4.70651 5.30771 5.92719 4.8022 7.19998 4.8022C8.47276 4.8022 9.69344 5.30771 10.5936 6.20757L12 7.61277L13.4064 6.20757C13.8492 5.74912 14.3788 5.38345 14.9644 5.13188C15.5501 4.88032 16.1799 4.74791 16.8172 4.74237C17.4546 4.73683 18.0866 4.85828 18.6766 5.09963C19.2665 5.34098 19.8024 5.69739 20.2531 6.14807C20.7038 6.59876 21.0602 7.13469 21.3015 7.72459C21.5429 8.31449 21.6643 8.94656 21.6588 9.5839C21.6532 10.2212 21.5208 10.8511 21.2693 11.4367C21.0177 12.0223 20.652 12.552 20.1936 12.9948L12 21.1896L3.80638 12.9948C2.90651 12.0946 2.401 10.874 2.401 9.60117C2.401 8.32838 2.90651 7.1077 3.80638 6.20757V6.20757Z" stroke="#202020" stroke-width="2" stroke-linejoin="round"/>
                                                                  </svg>
                                                                  {{ format_count($project_data->like_count) }}
                                                            </span>
                                                        </a>
                                                        <a href="">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M20.2338 15.6356C20.7253 14.5238 20.9983 13.2938 20.9983 12C20.9983 7.02944 16.9692 3 11.9991 3C7.02906 3 3 7.02944 3 12C3 16.9706 7.02906 21 11.9991 21C13.5993 21 15.1019 20.5823 16.4039 19.85L21 20.9991L20.2338 15.6356Z" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                  </svg>
                                                                  {{ format_count($project_data->comment_count) }}
                                                            </span>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    <!-------------------------------------post lernmore section-------------------------------->
                    <div class="lern_more_areas">
                        <a href="">
                            Load more
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
        document.addEventListener('DOMContentLoaded', () => {
    const listButton = document.querySelector('.list_buttons');
    const gridButton = document.querySelector('.grid_buttons');
    const boxList = document.querySelector('.box_list');
    const boxGrid = document.querySelector('.box_grid');

    // Function to switch to List view
    listButton.addEventListener('click', () => {
        listButton.classList.add('active_btns');
        gridButton.classList.remove('active_btns');
        boxList.style.display = 'block';
        boxGrid.style.display = 'none';
    });

    // Function to switch to Grid view
    gridButton.addEventListener('click', () => {
        gridButton.classList.add('active_btns');
        listButton.classList.remove('active_btns');
        boxGrid.style.display = 'block';
        boxList.style.display = 'none';
    });
});

</script>
