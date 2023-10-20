
@extends('layouts.cust_links')
@section('content')

  <div class="pt-5 pb-9">

    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="py-0">
      <div class="container-small">
        <div class="row g-5 mb-5 mb-lg-8" data-product-details="data-product-details">
          <div class="col-12 col-lg-6">
            <div class="row g-3 mb-3">
              <div class="col-12 col-md-2 col-lg-12 col-xl-2">
                <div class="swiper-products-thumb swiper swiper-container theme-slider overflow-visible" id="swiper-products-thumb" ></div>
              </div>
              <div class="col-12 col-md-10 col-lg-12 col-xl-10">
                <div class="d-flex align-items-center border rounded-3 text-center p-5 h-70 w-60" >
                  <div class="swiper swiper-container theme-slider" data-thumb-target="swiper-products-thumb" data-products-swiper='{"slidesPerView":1,"spaceBetween":16,"thumbsEl":".swiper-products-thumb"}'>
                    <img src="{{asset('images/'.$product->image)}}" style="display:inline-block;width:20rem;height:20rem">
                  </div>
                </div>
              </div>
            </div>
           
            {{-- <div class="d-flex">
             <button class="btn btn-lg btn-outline-warning rounded-pill w-100 me-3 px-2 px-sm-4">
                <span class="me-2 far fa-heart"></span>Add to wishlist</button> --}}
                {{-- <button class="btn btn-lg btn-warning rounded-pill w-100" type="submit">
                  <span class="fas fa-shopping-cart me-2"></span>Add to cart</button>
            </div> --}}
          </div>
          <div class="col-12 col-lg-6">
            <div class="d-flex flex-column justify-content-between h-80">
              <div>
                <div class="d-flex flex-wrap">
                  <div class="me-2"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span></div>
                  <p class="text-primary fw-semi-bold mb-2">6548 {{__('people rated')}} and reviewed </p>
                </div>
                {{-- <h3 class="mb-3 lh-sm">24" iMac® with Retina 4.5K display - Apple M1 8GB Memory - 256GB SSD - w/Touch ID (Latest Model) - Blue</h3> --}}

                <div class="d-flex flex-wrap align-items-start mb-3"><span class="badge bg-success fs--1 rounded-pill me-2">#1 Best seller</span><a class="fw-semi-bold" href="#!">{{$product->description}}</a></div>
                <div class="d-flex flex-wrap align-items-center">
                  <h1 class="me-3">${{$product->price}}</h1>
                  <p class="text-500 text-decoration-line-through fs-2 mb-0 me-3">${{$product->price+100}}.00</p>
                  <p class="text-warning fw-bolder fs-2 mb-0">10% off</p>
                </div>
                @if($product->qty)
                <p class="text-success fw-semi-bold fs-1 mb-2">In stock</p>

                <p class="mb-2 text-800"><strong class="text-1000">Do you want it on Saturday, July 29th?</strong> Choose <strong class="text-1000">Saturday Delivery </strong>at checkout if you want your order delivered within 12 hours 43 minutes, <a class="fw-bold" href="#!">Category: </a><strong class="text-1000">{{$product->category}}.</strong></p>
                <p class="text-danger fw-bold mb-5 mb-lg-0">Special offer ends in 23:00:45 hours</p>
              </div>
              <div>

                <div class="row g-3 g-sm-8 align-items-end">
     
                  <div class="col-12 col-sm">
                    <div class="d-flex">
                      @if (!Cart::instance(Auth::user()->id)->content()->where('id', $product->id)->count())
                    <span class="fw-semi-bold mb-2 text-900 m-2" ><strong>{{__('Quantity')}} : </strong></span>
                      
                        
                      
 
                        <form  action="{{route('add.to.cart',$product->id)}}" method="post">
                          @csrf
                          <input class="form-control text-center  bg-transparent bItem-1 px-0" name="qty" type="number" min="1" style="width:3rem" value="1" max="{{$product->qty}}" aria-label="Amount (to the nearest dollar)" />
                        
                          </div>
                              {{-- <button class="btn btn-lg btn-outline-warning rounded-pill w-100 me-3 px-2 px-sm-4">
                                <span class="me-2 far fa-heart"></span>Add to wishlist</button> --}}
                                
                                <button class="btn btn-lg btn-warning rounded-pill w-50" type="submit"style="margin-top:1rem">
                                  <span class="fas fa-shopping-cart me-2"></span>{{__('Add to cart')}}</button>
                            
                        </form>
                        @else
                        <button class="btn btn-lg btn-success rounded-pill w-50" type="submit"style="margin-top:1rem">
                          <span class="fas fa-shopping-cart me-2"></span>{{__('In cart')}}</button>
                    @endif
                        </div>
                        </div>
                        @else
                        <h2 class="text-danger   mr-0 mb-0 mt-5">Out of stock</h2>
                        <p class="text-warning fw-semi-bold fs-1 mb-2">Soon in stock</p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates cumque molestias at optio iure sapiente illum libero velit, accusantium deserunt. Impedit, nesciunt iure! Soluta odit aliquid rerum ducimus rem quibusdam.

        @endif
                        {{-- <div class="d-flex">
                           <button class="btn btn-lg btn-outline-warning rounded-pill w-100 me-3 px-2 px-sm-4">
                            <span class="me-2 far fa-heart"></span>Add to wishlist</button> 
                            <button class="btn btn-lg btn-warning rounded-pill w-100" type="submit">
                              <span class="fas fa-shopping-cart me-2"></span>Add to cart</button>
                        </div> --}}
                      
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- end of .container-->
    </section><!-- <section> close ============================-->
    <!-- ============================================-->




  </div>

  <!-- ============================================-->
  <!-- <section> begin ============================-->
  <section class="py-0 mb-9">
    <div class="container">
      <div class="d-flex flex-between-center mb-3">
        <div>
          <h3>{{__('Similar products')}}</h3>
          <p class="mb-0 text-700 fw-semi-bold">Essential for a better life</p>
        </div><button class="btn btn-sm btn-phoenix-primary">{{__('View all')}}</button>
      </div>
      <div class="swiper-theme-container products-slider ">
        <div class="swiper swiper-container theme-slider "
            data-swiper='{"slidesPerView":1,"spaceBetween":16,"breakpoints":{"450":{"slidesPerView":2,"spaceBetween":16},"576":{"slidesPerView":3,"spaceBetween":20},"768":{"slidesPerView":4,"spaceBetween":20},"992":{"slidesPerView":5,"spaceBetween":20},"1200":{"slidesPerView":6,"spaceBetween":16}}}'>
            <div class="swiper-wrapper grid-container">
               
               @foreach($products as $product)
                    <div class=" grid-item">
                        <div class="position-relative text-decoration-none product-card">
                            <div class="d-flex flex-column justify-content-between h-100">
                                <div>
                                    <div class="border border-1 border-2002 rounded-3 position-relative mb-3 " style="width:13rem;height:13rem">
                                        <button
                                            class="btn btn-outline-primary rounded-circle p-0 d-flex flex-center btn-wish z-index-2"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Add to wishlist"><span
                                                class="far fa-heart"></span></button><img class="img-fluid rounded-3" style="width:13rem;height:13rem" 
                                            src="{{asset('images/'.$product->image)}}" alt="" /></div>
                                            <form method="post" action="{{route('showProduct',$product->id)}}">
                                                @csrf
                                            <button class="stretched-link text-decoration-none" style="opacity:0" type="submit">
                                                </button>
                                            </form>
                                        <h6 class="mb-2 lh-sm line-clamp-3">{{$product->name}}</h6>
                                        <h6 class="mb-2 lh-sm line-clamp-3">{{$product->description}}</h6>

                                            
                                    <p class="fs--1"><span class="fa fa-star text-warning"></span><span
                                            class="fa fa-star text-warning"></span><span
                                            class="fa fa-star text-warning"></span><span
                                            class="fa fa-star text-warning"></span><span
                                            class="fa fa-star text-warning"></span><span
                                            class="text-500 fw-semi-bold ms-1">(13 {{__('people rated')}})</span></p>
                                </div>
                                <div>
                                    <h3 class="text-1100">${{$product->price}}.00</h3>
                                </div>
                                {{-- <form action="{{route('add.to.cart',$product->id)}}" method="post"> 
                                    @csrf
                                    <button class="btn btn-warning" style="margin:1rem" type="submit"> <span style="margin:1rem" >Add to cart</span>
                                    <svg class="svg-inline--fa fa-cart-shopping me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cart-shopping" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z"></path></svg>
                                    </button>
                                </form> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
                    
               
            </div>
        </div>
        <div class="swiper-nav">
            <div class="swiper-button-next"><span class="fas fa-chevron-right nav-icon"></span></div>
            <div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>
        </div>
    </div>
    </div><!-- end of .container-->
  </section><!-- <section> close ============================-->



@endsection