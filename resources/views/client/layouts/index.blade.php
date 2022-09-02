@extends('master-client')

@section('title' , 'SC Parking')


@section('content')


    <!-- slider Area -->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center" data-background="client/assets/img/hero/cha.png">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-9 col-md-10">
                            
                        </div>
                    </div>
                    <!-- Search Box -->
                    <div class="row">
                        <div class="col-xl-8">
                            <!-- form -->
                            <form action="" class="search-box">
                             
                               
                                    
                            </form>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- why choose SC Parking --}}
    <div class="our-services section-pad-t30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                    
                        <h2>Why choose SC parking ? </h2>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-contnet-center">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            {{-- <span class="flaticon-tour"></span> --}}
                            <img height="83"src='https://www.wilsonparking.com.au/siteassets/wilson-parking-business/technology/wp_rgb_touch_free.png'>
                        </div>
                        <div class="services-cap">
                           {{-- <h5><a href="job_listing.html">Design & Creative</a></h5> --}}
                            <span style='color : black ; '>Provide a touch-free, seamless experience with access being granted via credit card or vehicle number plate identification</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            {{-- <span class="flaticon-cms"></span> --}}
                            <img height="83" src='https://www.wilsonparking.com.au/siteassets/wilson-parking-business/technology/wp_rgb_car_park_barrier.png'>
                        </div>
                        <div class="services-cap">
                           {{-- <h5><a href="job_listing.html">Design & Development</a></h5> --}}
                            <span style='color : black ; '>SC Parking integrates our online booking technology with leading car park equipment providers to enable touch-free entry and exit</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            {{-- <span class="flaticon-report"></span> --}}
                            <img height="83" src='https://www.wilsonparking.com.au/siteassets/wilson-parking-business/technology/wp_rgb_calendar.png'>
                           
                        </div>
                        <div class="services-cap">
                           {{-- <h5><a href="job_listing.html">Sales & Marketing</a></h5> --}}
                            <span style='color : black ; '>Customers are increasingly wanting to plan and pre-book their parking and are seeking touch-free services on site in order to reduce stress and stay safe.</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            {{-- <span class="flaticon-app"></span> --}}
                            <img height="83" src='/client/remboursement.png'>
                           
                        </div>
                        <div class="services-cap">
                           {{-- <h5><a href="job_listing.html">Mobile Application</a></h5> --}}
                           <br> 
                           <span style='color : black ; '>FREE cancellations on online bookings up to one hour prior to your pre-booked arrival time.</span>
                        </div>
                    </div>
                </div>
               
              
              
              
            </div>
            <!-- More Btn -->
          
        </div>
    </div>

  
    
    <!-- How it works ? -->
    <div class="apply-process-area apply-bg pt-100 pb-100" data-background="client/assets/img/gallery/how-applybg.png">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle white-text text-center">
                        
                        <h2> How it works ?</h2>
                    </div>
                </div>
            </div>
            <!-- Apply Process Caption -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            {{-- <span class="flaticon-search"></span> --}}
                            <svg height='60' style='fill : white ; 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352c79.5 0 144-64.5 144-144s-64.5-144-144-144S64 128.5 64 208s64.5 144 144 144z"/></svg>
                        </div>
                        <div class="process-cap">
                           <h5>1.   Find your car park!</h5>
                           <p>SC Parking unearths new shared car parks for you every day. <br><br></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            {{-- <span class="flaticon-curriculum-vitae"></span> --}}
                            <svg height='60'style='fill : white ; ' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M64 64C28.7 64 0 92.7 0 128v80c26.5 0 48 21.5 48 48s-21.5 48-48 48v80c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V304c-26.5 0-48-21.5-48-48s21.5-48 48-48V128c0-35.3-28.7-64-64-64H64zm64 96l0 192H448V160H128zm-32 0c0-17.7 14.3-32 32-32H448c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H128c-17.7 0-32-14.3-32-32V160z"/></svg>
                        </div>
                        <div class="process-cap">
                           <h5>2. Compare and book!</h5>
                           <p>Book your place for a few hours, a few days or rent it by the month. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            {{-- <span class="flaticon-tour"></span> --}}
                            <svg  height='60'style='fill : white ; '  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM192 256h48c17.7 0 32-14.3 32-32s-14.3-32-32-32H192v64zm48 64H192v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V288 168c0-22.1 17.9-40 40-40h72c53 0 96 43 96 96s-43 96-96 96z"/></svg>
                        </div>
                        <div class="process-cap">
                           <h5>3. Park !</h5>
                           <p>When you arrive, you only need to show your reservation to the parking staff.
                             </p>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>

    
    <!-- Blog Area Start -->
    <div class="home-blog-area blog-h-padding">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        {{-- <span>Our latest blog</span> --}}
                        <h2>Our recent news</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="home-blog-single mb-30">
                        <div class="blog-img-cap">
                            <div class="blog-img">
                                
                                <img src="https://data.si/en/wp-content/uploads/2018/10/opening-branch-office-slovenia-800x445.jpg">
                                <!-- Blog date -->
                               
                            </div>
                            <div class="blog-cap">
                                
                                <h3><a href="single-blog.html">New branch opening in Europe</a></h3>
                                <a href="#" class="more-btn">Read more »</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="home-blog-single mb-30">
                        <div class="blog-img-cap">
                            <div class="blog-img">
                                <img height="300" width="800" src="https://www.nwave.io/wp-content/uploads/2018/07/Smart_Parking_Trends2-scaled.jpg" alt="">
                                <!-- Blog date -->
                               
                            </div>
                            <div class="blog-cap">
                                
                                <h3><a href="single-blog.html">We start using a smart technology for our parkings .</a></h3>
                                <a href="#" class="more-btn">Read more »</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Area End -->


@endsection