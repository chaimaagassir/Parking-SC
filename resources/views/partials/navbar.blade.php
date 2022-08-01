<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="tableau-de-bord">
          <img  style="width: 350px;
            height: 200px;"src="images/logo.svg" alt="logo" /> 
          </a>
          <a class="navbar-brand brand-logo-mini" href="tableau-de-bord">
            <img  src="images/logo-mini.svg" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
       
        <ul class="navbar-nav ms-auto">
         
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="images/faces/face8.jpg" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold">Allen Moreno</p>
                <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
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
    </nav>