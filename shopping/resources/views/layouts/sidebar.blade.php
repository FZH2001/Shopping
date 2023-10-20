<nav class="navbar navbar-light navbar-vertical navbar-vibrant navbar-expand-lg">
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                <li class="nav-item">
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#dashboard" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard">
                        <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div><span class="nav-link-icon"><span data-feather="cast"></span></span><span class="nav-link-text">{{__('Dashboard')}}</span>
                        </div>
                    </a>
                    <ul class="nav collapse parent show" id="dashboard">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('dashboard')}}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">E commerce</span></div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                       
                    </ul>
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <p class="navbar-vertical-label">E commerce</p>

                     <!-- parent pages-->
                     <a class="nav-link dropdown-indicator" href="#products" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="pages">
                         <div class="d-flex align-items-center">
                             <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div><span class="nav-link-icon"><span data-feather="layout"></span></span><span class="nav-link-text">{{__('Products Management')}}</span>
                         </div>
                     </a>
                     <ul class="nav collapse parent show" id="products">
                         <li class="nav-item">
                             <a class="nav-link" href="{{route('product.add')}}" aria-expanded="false">
                                 <div class="d-flex align-items-center"><span class="nav-link-text">{{__('Add new product')}}</span></div>
                             </a>
                             <!-- more inner pages-->
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="{{route('products.show')}}" aria-expanded="false">
                                 <div class="d-flex align-items-center"><span class="nav-link-text">{{__('Show products')}}</span></div>
                             </a>
                             <!-- more inner pages-->
                         </li>
                         
                     </ul>
                                          <!-- parent pages-->
                                          <a class="nav-link dropdown-indicator" href="" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="pages">
                                            <div class="d-flex align-items-center">
                                                <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div><span class="nav-link-icon"><span data-feather="layout"></span></span><span class="nav-link-text">{{__('Orders')}} & {{__('Carts')}}</span>
                                            </div>
                                        </a>
                                        <ul class="nav collapse parent show" id="orders_carts">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('orders')}}" aria-expanded="false">
                                                    <div class="d-flex align-items-center"><span class="nav-link-text">{{__('Orders')}}</span></div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('carts')}}" aria-expanded="false">
                                                    <div class="d-flex align-items-center"><span class="nav-link-text">{{__('Carts')}}</span></div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            
                                        </ul>
                 
                </li>
     
            </ul>
        </div>
        <div class="navbar-vertical-footer"><a class="btn btn-link border-0 fw-semi-bold d-flex ps-0" href="pages/authentication/simple/sign-out.html"><span class="navbar-vertical-footer-icon" data-feather="log-out"></span><span>Sign out</span></a></div>
    </div>
</nav>