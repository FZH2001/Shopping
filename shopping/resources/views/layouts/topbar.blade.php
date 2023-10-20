<nav class="navbar navbar-light navbar-top navbar-expand vertical-navbar">
    <div class="navbar-logo">
        <button class="btn navbar-toggler navbar-toggler-humburger-icon" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
        <a class="navbar-brand me-1 me-sm-3" href="index.html">
            <div class="d-flex align-items-center">
                <div class="d-flex align-items-center"><img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/2x/external-shopping-cart-technology-ecommerce-flaticons-lineal-color-flat-icons.png" class="rounded-full"
                    width="40" height="40" style="overflow:hidden" class="rounded img-fluid"/>
                    <p class="logo-text ms-2 d-none d-sm-block">E-Shop</p>
                </div>
            </div>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <div class="search-box d-none d-lg-block" style="width:25rem;">
            <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control form-control search-input search min-h-auto" type="search" placeholder="Search..." aria-label="Search" />
                <span class="fas fa-search search-box-icon"></span>
            </form>
        </div>
        <ul class="navbar-nav navbar-nav-icons ms-auto flex-row">
            <li class="nav-item dropdown">
                <a class="nav-link" id="navbarDropdownNotification" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-700" data-feather="bell" style="height:20px;width:20px;"></span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link notification-indicator notification-indicator-primary" id="navbarDropdownSettings" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-700" data-feather="settings" style="height:20px;width:20px;"></span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link notification-indicator notification-indicator-primary" id="navbarDropdownSettings" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-700" data-feather="settings" style="height:20px;width:20px;"></span></a>

{{-- <x-jet-dropdown align="right" width="20" >
                @if(App::getLocale()=='en')
            <x-slot name="trigger">

            <a title="English" style="color:black;text-decoration:none;"  href="{{route('lang','en')}}" data-toggle="dropdown"><span class="img label-before ml-2"><img src="https://cdn-icons-png.flaticon.com/128/330/330425.png" style="display:inline;padding:4px; width:28px"
                        alt="lang-en"></span>{{ __('English') }}<i class="fa fa-angle-down m-2"
                    aria-hidden="true"></i></a>

            </x-slot>
            <x-slot name="content">

            <li class=" dropdown-item menu-item"><a title="french" style="color:black;text-decoration:none;" href="{{route('lang','fr')}}" data="dropdown"><span
                        class="img label-before m-0"><img src="https://cdn-icons-png.flaticon.com/128/330/330490.png" style="display:inline;padding:3px;width:28px" alt="lang-fre"></span>{{ __('French') }}</a></li>

            </x-slot>
            @else
            <x-slot name="trigger">

            <a title="French" style="color:black;text-decoration:none;" href="{{route('lang','fr')}}" data-toggle="dropdown"><span class="img label-before ml-2"><img src="https://cdn-icons-png.flaticon.com/128/330/330490.png" style="display:inline;padding:4px;width:28px"
                        alt="lang-fr"></span>{{ __('French') }}<i class="fa fa-angle-down m-2"
                    aria-hidden="true"></i></a>

            </x-slot>
            <x-slot name="content">

            <li class=" dropdown-item menu-item"><a title="English" style="color:black;text-decoration:none;"  href="{{route('lang','en')}}"><span
                        class="img label-before m-0"><img src="https://cdn-icons-png.flaticon.com/128/330/330425.png" style="display:inline;padding:3px;width:28px" alt="lang-en"></span>{{ __('English') }}</a></li>
            </x-slot>
            @endif
</x-jet-dropdown> --}}
</li>
<li class="nav-item">
    @if(App::getLocale()=='en')
        <div class="dropdown"style="height:2rem">
          <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width:8rem;padding-right:0px;font-weight:2px">
            <img src="https://cdn-icons-png.flaticon.com/128/330/330425.png" style="display:inline; width:19px"
                            alt="lang-en">
            <span>English</span>
          </button>
          <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1" style="width:1rem;padding:0">
            <li class="d-flex align-items-center " style="padding:6px;">
              <img src="https://cdn-icons-png.flaticon.com/128/330/330490.png" style="display:inline; width:20px;"
                            alt="lang-fr">
              <a class="dropdown-item" href="{{route('lang','fr')}}"style="padding:0px;padding-left:10px;font-size:15px;width:80px">French</a>
            </li>
        
          </ul>
        </div>
      
      @else
      <div class="dropdown"style="height:2rem">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width:8rem;padding-right:0px;font-weight:2px">
          
                          <img src="https://cdn-icons-png.flaticon.com/128/330/330490.png" style="display:inline; width:20px;"
                          alt="lang-fr">
          <span>{{__('French')}}</span>
        </button>
        <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1" style="width:1rem;padding:0">
          <li class="d-flex align-items-center " style="padding:6px;">
            <img src="https://cdn-icons-png.flaticon.com/128/330/330425.png" style="display:inline; width:19px"
                          alt="lang-en">
            <a class="dropdown-item" href="{{route('lang','en')}}"style="padding:0px;padding-left:10px;font-size:15px;width:80px">{{__('English')}}</a>
          </li>
      
        </ul>
      </div>
    
  @endif
</li>
            <li class="nav-item dropdown">
                <a class="nav-link lh-1 px-0 ms-5" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-l ">
                        @if(Auth::user())
                        <img class="rounded-circle" src="{{asset('storage/'.Auth::user()->profile_photo_path)}}" alt="" />
                        @endif
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
                    <div class="card bg-white position-relative border-0">
                        <div class="card-body p-0">
                            <div class="text-center pt-4 pb-3">
                                <div class="avatar avatar-xl ">
                                    @if(Auth::user())
                                    <img class="rounded-circle" src="{{asset('storage/'.Auth::user()->profile_photo_path)}}" alt="" />
                                    @endif
                                </div>
                                @if(Auth::user())
                                <h6 class="mt-2">{{Auth::user()->name}}</h6>
                                @endif
                            </div>
                            <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" /></div>
                        </div>
                        <div class="overflow-auto scrollbar" style="height: 10rem;">
                            <ul class="nav d-flex flex-column mb-2 pb-1">
                                <li class="nav-item">
                                    <a class="nav-link px-3" href="{{route('profile.show')}}"> <span class="me-2 text-900" data-feather="user"></span>Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="pie-chart"></span>Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="lock"></span>Posts &amp; Activity</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="settings"></span>Settings &amp; Privacy </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="help-circle"></span>Help Center</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="globe"></span>Language</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer p-0 border-top">
                            <ul class="nav d-flex flex-column my-3">
                                <li class="nav-item">
                                    <a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user-plus"></span>Add another account</a>
                                </li>
                            </ul>
                            <hr />
                            <div class="px-3">
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                <button class="btn btn-phoenix-secondary d-flex flex-center w-100" type="submit"> <span class="me-2" data-feather="log-out"> </span>Sign out</button>
                                </form>
                            </div>
                            <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1" href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1" href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>