  <!-- Sidebar -->
  @include('userDash_template.dash_siderBar')
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        @include('userDash_template.dash_topBar')

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">

                {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
                </a> --}}
            </div>

            <!-- Content Row -->
            <div class="row">



                <!-- Creating project steps -->
                <div class="col-xl-8 col-md-12 col-12 mb-4">
                    <div class="card shadow py-2">
                        <div class="card-body custom_dash_cards_section">
                            <div class="top_main_headings">
                                <p class="h5 mb-0 text-gray-800"><strong> Your data portfolio</strong></p>
                            </div>
                            
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2 mb-5">
                                    <div class="row no-gutters align-items-center">

                                        <div class="col indicator_bar_steps">
                                            <div class="progress progress-sm mr-3">
                                                <div class="progress-bar bg-info" role="progressbar"
                                                    style="width: 0%" aria-valuenow="50" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div style="display: flex; justify-content: space-between;" class="custom_full_width_100">
                                            <p style="margin-right:5em;"><strong>0%</strong></p>
                                        <span class="mr-5" style="margin-right:5em;"> 5 steps left </span>
                                        <i class="fa fa-chevron-up" aria-hidden="true"></i>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div style="float:right"  class="user_bio_btns">
                                <button type="button" class="btn btn-light rounded-pill" style="background-color: #eee">Edit profile</button>
                            </div>

                            <div class="footer-container">
                                <div class="div-left">
                                  <ul class="footer">
                                    <li><button class="btn btn-primary rounded-circle text-dark" type="button" style="background-color: #fff">1 </button>
                                    </li>
                                    <li class="text-dark custom_point_heading"><strong>Add a profile photo</strong>
                                    </li>
                                  </ul>
                                </div>
                                {{-- <div class="div-right">
                                  <ul class="footer">
                                    <li><button type="button" class="btn btn-light rounded-pill" style="background-color: #eee">Edit profile</button>
                                    </li>

                                   </ul>
                                 </div> --}}
                               </div>
                               <div class="content_port_wrape">
                               <p class=" mr-10" style="margin-left: 65px; margin-right:300px justify-content: center">Add a profile photo to personalize your portfolio. Use a clear, high-resolution image, center yourself in the frame and
                                ensure good lighting and a professional background.</p>
                                </div>

                            <br/>

                            <div style="float:right"  class="user_bio_btns">
                                <button type="button" class="btn btn-light rounded-pill" style="background-color: #eee">Edit profile</button>
                            </div>

                            <div class="footer-container">
                                <div class="div-left">
                                  <ul class="footer">
                                    <li><button class="btn btn-primary rounded-circle text-dark" type="button" style="background-color: #fff">2 </button>
                                    </li>
                                    <li class="text-dark custom_point_heading"><strong>Update your bio information</strong>
                                    </li>
                                  </ul>
                                </div>
                                {{-- <div class="div-right">
                                  <ul class="footer">
                                    <li><button type="button" class="btn btn-light rounded-pill" style="background-color: #eee">Edit profile</button>
                                    </li>

                                   </ul>
                                 </div> --}}
                               </div>
                               <div class="content_port_wrape">
                               <p class=" mr-10" style="margin-left: 65px; margin-right:300px justify-content: center">
                                Showcase your personality, education, employment and unique journey through your bio. It’s the perfect way to introduce yourself to clients and employers.
                                </p>
                               </div>

                                <br/>

                                <div style="float:right"  class="user_bio_btns">
                                    <button type="button" class="btn btn-light rounded-pill" style="background-color: #eee">Create project</button>
                                </div>

                                <div class="footer-container">
                                    <div class="div-left">
                                      <ul class="footer">
                                        <li><button class="btn btn-primary rounded-circle text-dark" type="button" style="background-color: #fff">3 </button>
                                        </li>
                                        <li class="text-dark custom_point_heading"><strong>Publish your first portfolio project</strong>
                                        </li>
                                      </ul>
                                    </div>
                                    {{-- <div class="div-right">
                                      <ul class="footer">
                                        <li><button type="button" class="btn btn-light rounded-pill" style="background-color: #eee">Edit profile</button>
                                        </li>

                                       </ul>
                                     </div> --}}
                                   </div>
                                   <div class="content_port_wrape">
                                   <p class=" mr-10" style="margin-left: 65px; margin-right:300px justify-content: center">
                                    Publish your first project and showcase your creativity and skills to the public. Your portfolio is your stage, make it count!
                                    </p>

                                    </div>
                                    <br/>

                                <div style="float:right"  class="user_bio_btns">
                                    <button type="button" class="btn btn-light rounded-pill" style="background-color: #eee">View your projects</button>
                                </div>

                                <div class="footer-container">
                                    <div class="div-left">
                                      <ul class="footer">
                                        <li><button class="btn btn-primary rounded-circle text-dark" type="button" style="background-color: #fff">4 </button>
                                        </li>
                                        <li class="text-dark custom_point_heading"><strong>Publish 3 portfolio projects</strong>
                                        </li>
                                      </ul>
                                    </div>
                                    {{-- <div class="div-right">
                                      <ul class="footer">
                                        <li><button type="button" class="btn btn-light rounded-pill" style="background-color: #eee">Edit profile</button>
                                        </li>

                                       </ul>
                                     </div> --}}
                                   </div>
                                   <div class="content_port_wrape">
                                   <p class=" mr-10" style="margin-left: 65px; margin-right:300px justify-content: center">
                                        Your portfolio grows stronger with variety. Publishing at least three projects demonstrates your versatility, expertise, and creativity to potential clients and employers.
                                    </p>
                                    </div>
                                    <br/>

                                <div style="float:right"  class="user_bio_btns">
                                    <button type="button" class="btn btn-light rounded-pill" style="background-color: #eee">
                                      <span>
                                                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                      <path d="M21.0002 11.4606L11.4002 5.10156L11.4002 8.70156C3 10.5016 3 18.9016 3 18.9016C3 18.9016 6.6 14.1016 11.4002 14.7016L11.4002 18.4216L21.0002 11.4606Z" stroke="#666666" stroke-width="2" stroke-linejoin="round"/>
                                    </svg>
                                      </span>
                                    Share projects</button>
                                </div>

                                <div class="footer-container">
                                    <div class="div-left">
                                      <ul class="footer">
                                        <li><button class="btn btn-primary rounded-circle text-dark" type="button" style="background-color: #fff">5 </button>
                                        </li>
                                        <li class="text-dark custom_point_heading"><strong>Share your first project</strong>
                                        </li>
                                      </ul>
                                    </div>
                                    {{-- <div class="div-right">
                                      <ul class="footer">
                                        <li><button type="button" class="btn btn-light rounded-pill" style="background-color: #eee">Edit profile</button>
                                        </li>

                                       </ul>
                                     </div> --}}
                                   </div>
                                   <div class="content_port_wrape">
                                   <p class="mr-10" style="margin-left: 65px; margin-right:300px justify-content: center">
                                    You've published your first project—now let the world see it! Sharing your work increases your visibility and connects you with opportunities.
                                    </p>
                                    </div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-4 mb-4">
                   


                    <!-- Approach -->
                    <div class="card shadow mb-4 skill_prg_round">
                        <div class="text-center">
                            <div class="row d-flex justify-content-center">



                            </div>
                        </div>



                      <div class="row px-2 template-demo justify-content-center mb-2 mt-2">
                        <div class="col-sm-3 col-md-4 col-6 circle-progress-block">
                            <div class="wraping_chart">
                            <div id="circleProgress1" class="progressbar-js-circle">
                                <svg viewBox="0 0 100 100" style="display: block; width: 100%;">
                                    <path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="#eee" stroke-width="3" fill-opacity="0"></path>
                                    <path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="" stroke-width="3" fill-opacity="0" style="stroke-dasharray: 301.635, 301.635; stroke-dashoffset: 199.079;">
                                    </path>
                                </svg>
                            <div class="progressbar-text text-center" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(0, 0, 0); font-size: 1rem;">
                                <strong>0%</strong> <br/>
                                <span class="small_total_prg" >Total progress</span>
                                </div>
                            </div>
                            </div>
                        </div>
                      </div>


                    </div>
                    <!-----------------bottom _author------------------->
                    <div class="card shadow mb-4">
                        <div class="card-body px-0 custom_dash_cards_section">
                            <!-- Portfolio Indicator-->
                            <div class="d-flex align-items-center justify-content-between px-4">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-5 mr-2" width="80" height="80" src="{{asset('assets/img/team/user_profile.png')}}">
                                    <div class="ms-4">
                                        <div class="small text-dark author_name"><b>Abel Developer</b></div>
                                        <div class="text-xs text-muted author_deg">Customer Service Representative</div>
                                     </div>

                                </div>

                            </div>
                        </div>
                        <div class="author_content_wrapings">
                        <p class="d-inline-block text-justify" style="">
                            Hi Abel! Our support team is ready to help you navigate the platform and answer
                            any inquiries. Whether you're unsure about a feature, stuck on a task,
                            or need guidance, we've got you covered.</p>

                            <div style=" margin-left:0px">
                                <button type="button" class="btn btn-outline-primary   rounded-pill">
                                    <i class="fa fa-comment"> </i>
                                    <span>
                                    Start chat
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Illustrations -->
                </div>

                <br/>
                {{-- connecting to community --}}
                <div class="col-xl-8 col-md-12 col-12 mb-4">
                    <br/>
                    <div class="card shadow py-2">
                        <div class="card-body custom_dash_cards_section">

                            <div class="top_main_headings">
                            <p class="h5 mb-0 text-gray-800"><strong> Connect with the Clap Academy Community</strong></p>
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2 mb-5">
                                    <div class="row no-gutters align-items-center">

                                        <div class="col indicator_bar_steps">
                                            <div class="progress progress-sm mr-3">
                                                <div class="progress-bar bg-info" role="progressbar"
                                                    style="width: 0%" aria-valuenow="50" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div style="display: flex; justify-content: space-between;"  class="custom_full_width_100">
                                            <p style="margin-right:5em;"><strong>0%</strong></p>
                                        <span class="mr-5" style="margin-right:5em;"> 5 steps left </span>
                                        <i class="fa fa-chevron-up" aria-hidden="true"></i>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div style="float:right"  class="user_bio_btns">
                                <button type="button" class="btn btn-light rounded-pill" style="background-color: #eee">Edit profile</button>
                            </div>

                            <div class="footer-container">
                                <div class="div-left">
                                  <ul class="footer">
                                    <li><button class="btn btn-primary rounded-circle text-dark" type="button" style="background-color: #fff">1 </button>
                                    </li>
                                    <li class="text-dark custom_point_heading"><strong>Follow Clap Academy on LinkedIn</strong>
                                    </li>
                                  </ul>
                                </div>
                                {{-- <div class="div-right">
                                  <ul class="footer">
                                    <li><button type="button" class="btn btn-light rounded-pill" style="background-color: #eee">Edit profile</button>
                                    </li>

                                   </ul>
                                 </div> --}}
                               </div>
                               <div class="content_port_wrape">
                               <p class="mb-5 mr-10" style="margin-left: 65px; margin-right:300px justify-content: center">
                                Add a profile photo to personalize your portfolio. Use a clear, high-resolution image, center yourself in the frame and
ensure good lighting and a professional background.
                               </p>
</div>
                            <br/>

                            <div style="float:right" class="user_bio_btns">
                                <button type="button" class="btn btn-light rounded-pill" style="background-color: #eee">Edit profile</button>
                            </div>

                            <div class="footer-container">
                                <div class="div-left">
                                  <ul class="footer">
                                    <li><button class="btn btn-primary rounded-circle text-dark" type="button" style="background-color: #fff">2 </button>
                                    </li>
                                    <li class="text-dark custom_point_heading"><strong>Drop your first like</strong>
                                    </li>
                                  </ul>
                                </div>
                                {{-- <div class="div-right">
                                  <ul class="footer">
                                    <li><button type="button" class="btn btn-light rounded-pill" style="background-color: #eee">Edit profile</button>
                                    </li>

                                   </ul>
                                 </div> --}}
                               </div>
                               <div class="content_port_wrape">
                               <p class="mb-5 mr-10" style="margin-left: 65px; margin-right:300px justify-content: center">
                                Showcase your personality, education, employment and unique journey through your bio. It’s the perfect way to introduce yourself to clients and employers.
                                </p>
</div>
                                <br/>

                                <div style="float:right"  class="user_bio_btns">
                                    <button type="button" class="btn btn-light rounded-pill" style="background-color: #eee">Create project</button>
                                </div>

                                <div class="footer-container">
                                    <div class="div-left">
                                      <ul class="footer">
                                        <li><button class="btn btn-primary rounded-circle text-dark" type="button" style="background-color: #fff">3 </button>
                                        </li>
                                        <li class="text-dark custom_point_heading"><strong>Comment on a project</strong>
                                        </li>
                                      </ul>
                                    </div>
                                    {{-- <div class="div-right">
                                      <ul class="footer">
                                        <li><button type="button" class="btn btn-light rounded-pill" style="background-color: #eee">Edit profile</button>
                                        </li>

                                       </ul>
                                     </div> --}}
                                   </div>
                                   <div class="content_port_wrape">
                                   <p class="mb-5 mr-10" style="margin-left: 65px; margin-right:300px justify-content: center">
                                    Publish your first project and showcase your creativity and skills to the public. Your portfolio is your stage, make it count!
                                    </p>
</div>

                                    <br/>

                                <div style="float:right"  class="user_bio_btns">
                                    <button type="button" class="btn btn-light rounded-pill" style="background-color: #eee">View your projects</button>
                                </div>

                                <div class="footer-container">
                                    <div class="div-left">
                                      <ul class="footer">
                                        <li><button class="btn btn-primary rounded-circle text-dark" type="button" style="background-color: #fff">4 </button>
                                        </li>
                                        <li class="text-dark custom_point_heading"><strong>Follow another user</strong>
                                        </li>
                                      </ul>
                                    </div>
                                    {{-- <div class="div-right">
                                      <ul class="footer">
                                        <li><button type="button" class="btn btn-light rounded-pill" style="background-color: #eee">Edit profile</button>
                                        </li>

                                       </ul>
                                     </div> --}}
                                   </div>
                                   <div class="content_port_wrape">
                                   <p class="mb-5 mr-10" style="margin-left: 65px; margin-right:300px justify-content: center">
                                        Your portfolio grows stronger with variety. Publishing at least three projects demonstrates your versatility, expertise, and creativity to potential clients and employers.
                                    </p>
</div>
                                    <br/>

                                <div style="float:right"  class="user_bio_btns">
                                    <button type="button" class="btn btn-light rounded-pill" style="background-color: #eee">
                                      <span>
                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                          <path d="M21.0002 11.4606L11.4002 5.10156L11.4002 8.70156C3 10.5016 3 18.9016 3 18.9016C3 18.9016 6.6 14.1016 11.4002 14.7016L11.4002 18.4216L21.0002 11.4606Z" stroke="#666666" stroke-width="2" stroke-linejoin="round"/>
                                        </svg>
                                      </span>
                                    Share projects</button>
                                </div>

                                <div class="footer-container">
                                    <div class="div-left">
                                      <ul class="footer">
                                        <li><button class="btn btn-primary rounded-circle text-dark" type="button" style="background-color: #fff">5 </button>
                                        </li>
                                        <li class="text-dark custom_point_heading"><strong>Share your profile</strong>
                                        </li>
                                      </ul>
                                    </div>
                                    {{-- <div class="div-right">
                                      <ul class="footer">
                                        <li><button type="button" class="btn btn-light rounded-pill" style="background-color: #eee">Edit profile</button>
                                        </li>

                                       </ul>
                                     </div> --}}
                                   </div>
                                   <div class="content_port_wrape">
                                   <p class="mb-5 mr-10" style="margin-left: 65px; margin-right:300px justify-content: center">
                                    You've published your first project—now let the world see it! Sharing your work increases your visibility and connects you with opportunities.
                                    </p>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->
        </div>

      </div>
      @include('userDash_template.dash_footer')
  </div>
