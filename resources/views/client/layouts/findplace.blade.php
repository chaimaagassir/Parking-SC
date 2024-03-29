@extends('master-client')

@section('title' , 'SC Parking | Find place ')


@section('content')


    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="client/assets/img/hero/park.gif">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Get your place</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- Job List Area Start -->
    <div class="job-listing-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <!-- Left content -->
                <div class="col-xl-3 col-lg-3 col-md-4">
                    <div class="row">
                        <div class="col-12">
                                <div class="small-section-tittle2 mb-45">
                                <div class="ion"> <svg 
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="20px" height="12px">
                                <path fill-rule="evenodd"  fill="rgb(27, 207, 107)"
                                    d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"/>
                                </svg>
                                </div>
                                <h4>Filter Parking</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Job Category Listing start -->
                    <div class="job-category-listing mb-50">
                        <!-- single one -->
                        <div class="single-listing">
                           <div class="small-section-tittle2">
                                 <h4>Search by city</h4>
                           </div>
                            <!-- Select job items start -->
                            <div class="select-job-items2">
                                <form action="findplace/filter" method="get"> 
                                    @csrf
                                <select class="form-control" name="ville">
                                    @forelse($parking_filter as $p)
                                    <option value="{{ $p->ville }}" >{{ $p->ville }}</option>
                                    @empty <option > aucune ville </option>
                                    @endforelse
                                </select>  
                                
                                {{-- <input  class="form-control" type="search" name="ville"> --}}
                                <button style="display: inline-block;
                                padding: 15px 25px;
                                font-size: 15px;
                                margin-top: 15px;
                                text-align: center;
                                text-decoration: none;
                                outline: none;
                                background-color: #4CAF50;
                                border: none;
                                border-radius: 15px;
   9px #999;background:#3630a3;color:white;" >Search</button>
                                </form>
                            </div>
                            
                            <!--  Select job items End-->
                            <!-- select-Categories start -->
                            
                            <!-- select-Categories End -->
                        </div>
                        <!-- single two -->
                        
                        <!-- single three -->
                        
                        
                    </div>
                    <!-- Job Category Listing End -->
                </div>
                <!-- Right content -->
                <div class="col-xl-9 col-lg-9 col-md-8">
                    <!-- Featured_job_start -->
                    
                    <section class="featured-job-area">
                        
                        <div class="container">
                            
                            <!-- single-job-content -->
                            
                            @forelse ($parkingf as $p)
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="#"><img src="../../uploads/parkings/{{ $p->image }}" width="250" 
                                            height="200" alt="image"/></a>
                                    </div>
                                    <div class="job-tittle job-tittle2">
                                        <a href="#">
                                            <h4>{{ $p->ville }}</h4>
                                        </a>
                                        <ul>
                                            <li>{{ $p->emplacement }}</li>
                                            <li><i class="fas fa-map-marker-alt"> </i>{{ $p->ville }}</li>
                                            <li>{{ $p->prix_heure }} DH </li>
                                          </ul>
                                    </div>
                                </div>
                                
                                <div class="items-link items-link2 f-right">
                                    <a href=" {{ route ('parking-details', ['parking_id'=>$p->id ] ) }} ">Details</a>
                                    
                                </div>
                                
                                
                            </div>
                            @empty <h1> rien à afficher </h1>
                            @endforelse
                            
                            
                           
                            
                           
                        </div>
                        
                    </section>
                    <!-- Featured_job_end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Job List Area End -->
    <!--Pagination Start  -->
    <div class="pagination-area pb-115 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                {!! $parkingf->links() !!} 
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Pagination End  -->
    

@endsection