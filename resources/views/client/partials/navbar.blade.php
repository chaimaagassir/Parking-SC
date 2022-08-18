
    <!-- Header Start -->
   <div class="header-area header-transparrent">
       <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <div class="logo">
                            <a href="/"><img src="client/assets/img/logo/log.svg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li><a href="/">Home</a></li>
                                        {{-- @if (Route::has('login'))
                                        @auth --}}
                                        <li><a href="findplace">Find Place </a></li>
                                        {{-- @endauth
                                        @endif --}}
                                        <li><a href="about">About</a></li>
                                        <li><a href="FAQ">FAQ</a></li>
                                        <li><a href="contact">Contact</a></li>
                                        @if (Route::has('login'))
                                        @auth
                                        <li><a href="reservations"> My reservations</a></li>
                                        <li><a href="vehicules">my vehicles </a></li>
                                        @endauth
                                        @endif
                                    </ul>
                                </nav>
                            </div>          
                            <!-- Header-btn -->
                           
                            @if (Route::has('login'))
                            @auth
                            <div class="navbar-menu-wrapper d-flex align-items-top"> 
                                
                                <ul class="navbar-nav ms-auto">
                                  
                                  <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                                    
                                    <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                      <svg height ='23'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"/></svg> </a>
                                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                                      <div class="dropdown-header text-center">
                                        <svg height ='23'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"/></svg>
                                        <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
                                        <p class="fw-light text-muted mb-0">{{ Auth::user()->email }}</p>
                                      </div>
                                      <a class="dropdown-item" href="{{ route('profile.show') }}"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile 
                                    
                                                    {{-- <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                                        {{ __('Profile') }}
                                                    </x-jet-dropdown-link>
                        
                                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                            {{ __('API Tokens') }}
                                                        </x-jet-dropdown-link>
                                                    @endif --}}
                                      </a>
                                      
                                     
                                      {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                                      @click.prevent="$root.submit();"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out
                                       
                                      </a> --}}
                        
                                      <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                       
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        this.closest('form').submit(); " role="button">
                                                <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out
                                            </a>
                                       
                                    </form>
                                 
                                    </div>
                                  </li>
                                </ul>
                                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                                  <span class="mdi mdi-menu"></span>
                                </button>
                              </div>
                               
                             @else
                                 
                             <div class="header-btn d-none f-right d-lg-block">
                              
                                <a href="login" class="btn head-btn2">Login</a>
                                <a href="register" class="btn head-btn1">Register</a>
                             
                             </div>
                             @endauth
                             @endif
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
       </div>
   </div>
    <!-- Header End -->
