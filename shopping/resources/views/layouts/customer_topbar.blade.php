
    <div class="container-small">
      <div class="ecommerce-topbar">
        
        <nav class="navbar navbar-expand-lg navbar-light px-0">
          <div class="row gx-0 gy-2 w-100 flex-between-center">
            <div class="col-auto"><a class="text-decoration-none" href="{{route('home')}}">
                <div class="d-flex align-items-center"><img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/2x/external-shopping-cart-technology-ecommerce-flaticons-lineal-color-flat-icons.png" class="rounded-full"
                  width="40" height="40" style="overflow:hidden" class="rounded img-fluid"/>
                  <p class="logo-text ms-2">E-Shop</p>
                </div>
              </a></div>
            <div class="col-auto order-md-1">
              <ul class="navbar-nav navbar-nav-icons flex-row me-n2">
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
                  
                <li class="nav-item">
                  @if(Auth::user())
                  <form method="post" action="{{route('showcart',Auth::user()->id)}}">
                    @csrf
                  <button class=" btn btn-submit nav-link px-2 icon-indicator icon-indicator-primary" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart text-700" style="height:20px;width:20px;"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                    <span class="text-700" data-feather="shopping-cart" style="height:20px;width:20px;"></span>
                    <span class="icon-indicator-number">{{Cart::instance(Auth::user()->id)->count()}}</span>
                    
                  </button>
                  </form>
                  @else
                  <button class=" btn btn-submit nav-link px-2 icon-indicator icon-indicator-primary" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart text-700" style="height:20px;width:20px;"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                    <span class="text-700" data-feather="shopping-cart" style="height:20px;width:20px;"></span>
                    <span class="icon-indicator-number">0</span>
                    
                  </button>
                  @endif
                </li>
                {{-- <li class="nav-item dropdown">
                  <a class="nav-link px-2 icon-indicator icon-indicator-sm icon-indicator-danger" id="navbarDropdownNotification" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell text-700" style="height:20px;width:20px;"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                  <span class="text-700" data-feather="bell" style="height:20px;width:20px;"></span></a>
                </li> --}}
                @if(Auth::user())
                <li class="nav-item dropdown">
                  <a class="nav-link px-2"  href="{{route('myorders',Auth::user()->id)}}" role="button" ><span class="text-700" data-feather="settings" style="height:20px;width:20px;">
                    <img src="https://cdn-icons-png.flaticon.com/512/1007/1007908.png" width="24px" height="24px">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings text-700" style="height:20px;width:20px;"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg> --}}
                  </span></a>
                </li>
            
                <li class="nav-item dropdown"><a class="nav-link px-2" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-700" data-feather="user" style="height:20px;width:20px;">
                  <div class="avatar avatar-xl ">
                    <img class="rounded-circle" style="width:20px;height:20px" height="16px" src="{{asset('storage/'.Auth::user()->profile_photo_path)}}" alt="" />
                  </div>                 
                  <div class="dropdown-menu dropdown-menu-end py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
                    <div class="card bg-white position-relative border-0">
                      <div class="card-body p-0">
                        <div class="text-center pt-4 pb-3">
                          <div class="avatar avatar-xl ">
                            <img class="rounded-circle" src="{{asset('storage/'.Auth::user()->profile_photo_path)}}" alt="" />
                          </div>
                          <h6 class="mt-2">{{Auth::user()->name}}</h6>
                        </div>
                      </div>
                      <div class="overflow-auto scrollbar" style="height: 8rem;">
                        <ul class="nav d-flex flex-column mb-2 pb-1">
                          <li class="nav-item"><a class="nav-link px-3" href="{{route('profile.show')}}"> <span class="me-2 text-900" data-feather="user"></span>Profile</a></li>
                          <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="lock"></span>Posts &amp; Activity</a></li>
                          <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="globe"></span>Language</a></li>
                        </ul>
                      </div>
                      <div class="card-footer p-0 border-top">
                        
                        <hr />
                        <div class="px-3">
                          <form action="{{route('logout')}}" method="post">
                            @csrf
                           <button class="btn btn-phoenix-secondary d-flex flex-center w-100" type="submit"> <span class="me-2" data-feather="log-out"> </span>Sign out</button>
                          </form>
                        </div>
                        <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1" href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1" href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div>
                      </div>
                    </div>
                  </div>
                </li>
                @else
                <li class="nav-item dropdown"><a class="nav-link px-2" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-700" data-feather="user" style="height:20px;width:20px;">
                  <div class="avatar avatar-xl ">
                    <img class="rounded-circle" src="{{asset('images/unknown.jpeg')}}" alt="" style="width:20px;height:20px" />

                  </div>                 
                  <div class="dropdown-menu dropdown-menu-end py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
                    <div class="card bg-white position-relative border-0">
                      <div class="card-body p-0">
                        <div class="text-center pt-4 pb-3">
                          <div class="avatar avatar-xl ">
                            <img class="rounded-circle" src="{{asset('images/unknown.jpeg')}}" alt="" />
                          </div>
                        </div>
                      </div>
                      <div class="overflow-auto scrollbar" >
                        <ul class="nav d-flex flex-column mb-2 pb-1">
                          <li class="nav-item"><a class="nav-link px-3" href="{{route('login')}}"> <span class="me-2 text-900" data-feather="lock"></span>Login</a></li>
                          <li class="nav-item"><a class="nav-link px-3" href="{{route('register')}}"> <span class="me-2 text-900" data-feather="globe"></span>Register</a></li>
                        </ul>
                      </div>
                      <div class="card-footer p-0 border-top">
     
                        <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1" href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1" href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div>
                      </div>
                    </div>
                  </div>
                </li>
              @endif
              </ul>
            </div>
            <div class="col-12 col-md-6">
              <div class="search-box ecommerce-search-box w-100">
                <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                  <input class="form-control form-control search-input search" type="search" placeholder="{{__('Search')}}" aria-label="Search" />
                  
                  <span class="fas fa-search search-box-icon"></span>
                </form>
              </div>
            </div>
          </div>
        </nav>
      </div>
   
  <!-- ============================================-->

  <nav class="ecommerce-navbar navbar-expand navbar-light navbar-expand-lg rounded-pill bg-white justify-content-around p-3  text-center " >
    <div class="container-small flex-between-center text-center" data-navbar="data-navbar">

      <ul class="navbar-nav d-flex justify-content-center align-items-center text-center" >
        <li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link ps-0 active" aria-current="page" href="{{route('home')}}">{{__('See All')}}</a></li>
        <li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link  " aria-current="page" href="{{route('showcategory','phones')}}">{{__('Phones')}}</a></li>
        <li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link  "  aria-current="page" href="{{route('showcategory','laptops')}}">{{__('Laptops')}}</a></li>
        <li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link  " aria-current="page" href="{{route('showcategory','ipads')}}">{{__('Ipads')}}</a></li>
        <li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link " aria-current="page" href="{{route('showcategory','watchs')}}">{{__('Headphones')}} & {{__('Watchs')}}</a></li>
       
      </ul>
    </div>
  </nav>