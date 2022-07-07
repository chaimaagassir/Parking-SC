@extends('master-client')

@section('title' , 'SC Parking | Parking details ')


@section('content')


    <!-- Hero Area Start-->
    <div class="slider-area ">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="client/assets/img/hero/about.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Parking details</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Hero Area End -->
    <!-- job post company Start -->
    <div class="job-post-company pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <a href="#"><img src="client/assets/img/icon/pa1.png" width="150" 
                                    height="100" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="#">
                                    <h4>Casablanca Parking</h4>
                                </a>
                                <ul>
                                    <li>Sidi Maarouf</li>
                                    <li><i class="fas fa-map-marker-alt"></i>Casablanca</li>
                                    <li>35DH - 40DH</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                      <!-- job single End -->
                   
                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Parking Description</h4>
                            </div>
                            <p>Le parking de casablanca est un espace aménagé spécialement pour tous les usagers de la route afin qu'ils puissent stationner leurs véhicules en toute sécurité</p>
                        </div>
                        
                    </div>

                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                       <div class="small-section-tittle">
                           <h4>Parking Overview</h4>
                       </div>
                      <ul>
                          <li>Posted date : <span>12 Aug 2019</span></li>
                          <li>Location : <span>Casablanca</span></li>
                          <li>Price : <span>35DH-40DH</span></li>
                          <li>Park condition : <span>Full time</span></li>

                      </ul>
                     <div class="apply-btn2">
                        
                        <a href="reserver" class="btn">Reserver</a>
                     </div>
                   </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->


@endsection