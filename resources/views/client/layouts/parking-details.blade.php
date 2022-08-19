@extends('master-client')

@section('title' , 'SC Parking | Parking details ')


@section('content')


    <!-- Hero Area Start-->
    {{-- <div class="slider-area ">
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
    </div> --}}
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
                            @forelse ($parking as $p)
                            <div class="company-img company-img-details">
                                <a href="#"><img src="../../uploads/parkings/{{ $p->image }}" width="250" 
                                    height="200" alt="image"/></a>
                            </div>
                            <div class="job-tittle">
                                
                                <a href="#">
                                    <h4>{{ $p->ville }}</h4>
                                </a>
                                <ul>
                                    <li>{{ $p->emplacement }}</li>
                                    <li><i class="fas fa-map-marker-alt"></i>{{ $p->ville }}</li>
                                    <li>{{ $p->prix }}</li>
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
                            @php
                            $nb_place =  $p->nb_p_c_voiture  + $p->nb_p_nc_voiture + $p->nb_p_c_moto + $p->nb_p_nc_moto  ;
                            @endphp
                            
                            @if( $p->description ==null)
                            <p> Le parking de {{ $p->emplacement }} qui se situe à {{ $p->ville }} contient @php echo $nb_place  ; @endphp places séparés entre des places de voiture couverte et non couverte et  des places moto couverte et non couverte . </p>
                            @else
                            <p>{{ $p->description }}</p>
                            @endif
                        </div>
                        
                    </div>
                    @empty <h1> rien à afficher </h1>
                    @endforelse
                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                       <div class="small-section-tittle">
                           <h4>Parking Overview</h4>
                       </div>
                      <ul>
                          <li>Posted date : <span>{{$p->created_at->format('Y-m-d')}}</span></li>
                          <li>Location : <span>{{$p->ville}}</span></li>
                          <li>Price : <span>{{$p->prix}}</span></li>
                          <li>Park condition : <span>Full time</span></li>

                      </ul>
                     <div class="apply-btn2">
                        
                        <a href="{{route('reserver' ,$p->id )}}" class="btn">Reserver</a>
                     </div>
                   </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->


@endsection