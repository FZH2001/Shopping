@extends('layouts.cust_links')
  @section('content')
    <div class="ecommerce-homepage pt-5 mb-9">

        

<style >
.grid-container{


    display:flex;
    overflow-x: auto;
  
}
.grid-item{
margin:5px;
}
</style>

        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="py-0">
            <div class="container">
                <div class="row g-3 mb-9">
                    <div class="col-12">
                        <div class="whooping-banner w-100 rounded-3 overflow-hidden">
                            <div class="bg-holder z-index--1 "
                                style="background-image:url('https://cdn.pixabay.com/photo/2017/11/27/21/31/computer-2982270_1280.jpg');object-fit: contain;-webkit-filter: blur(0px); image-rendering: auto;
                                image-rendering: crisp-edges;
                                image-rendering: pixelated;"></div>
                            <!--/.bg-holder-->
                            <div class="bg-holder z-index--1 shape-bg"
                                style="background-image:url('');" >
                            </div>
                            <!--/.bg-holder-->
                            <div class="banner-text">
                                <h2 class="text-primary fw-bolder fs-lg-5 fs-xxl-7">Whooping <span class="gradient-text">60%
                                    </span>Off</h2>
                                <h3 class="fw-bolder fs-lg-3 fs-xxl-5">on everyday items</h3>
                            </div><button class="btn btn-primary rounded-pill banner-button">{{__('Shop now')}}</button>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6">
                        <div class="gift-items-banner w-100 rounded-3 overflow-hidden">
                            <div class="bg-holder z-index--1 banner-bg"
                                style="background-image:url('		https://www.apple.com/v/home/ap/images/heroes/macbook-pro-13/hero_mbp13__f88jcbca0ve6_medium_2x.jpg');">
                            </div>
                            <!--/.bg-holder-->
                            <div class="banner-text text-md-center">
                                <h2 class="text-white fw-bolder fs-xl-4">Get <span class="gradient-text">10% Off </span><br
                                        class="d-md-none"> on gift items</h2><button
                                    class="btn btn-primary rounded-pill banner-button">{{__('Buy Now')}}</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6">
                        <div
                            class="best-in-market-banner d-flex h-100 px-4 px-sm-7 py-5 px-md-11 rounded-3 overflow-hidden">
                            <div class="bg-holder z-index--1 banner-bg"
                                style="background-image:url('	https://cdn.pixabay.com/photo/2014/12/30/11/55/office-583839__480.jpg');"></div>
                            <!--/.bg-holder-->
                            <div class="row align-items-center w-100">
                                <div class="col-8">
                                    <div class="banner-text">
                                        <h2 class="text-white fw-bolder fs-sm-4 mb-5"><br><span
                                                class="fs-1 fs-sm-2"> </span></h2><button
                                            class="btn btn-warning rounded-pill banner-button">{{__('Buy Now')}}</button>
                                    </div>
                                </div>
                                <div class="col-4"><img class="w-75" src="	
                                  "
                                        alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
   
                <div class="mb-6">
                    <div class="d-flex flex-between-center mb-3">
                        <div class="d-flex">
                            <span class="fas fa-bolt text-warning fs-2"></span>
                            <h3 class="mx-2">{{__('Top Deals today')}}</h3>
                            <span class="fas fa-bolt text-warning fs-2"></span>
                        </div>
                        <a class="fw-bold d-none d-md-block" href="#!">{{__('Explore more')}}<span
                                class="fas fa-chevron-right fs--1 ms-1"></span></a>
                    </div>
                    <div class="swiper-theme-container products-slider ">
                        <div class="swiper swiper-container theme-slider "
                            data-swiper='{"slidesPerView":1,"spaceBetween":16,"breakpoints":{"450":{"slidesPerView":2,"spaceBetween":16},"576":{"slidesPerView":3,"spaceBetween":20},"768":{"slidesPerView":4,"spaceBetween":20},"992":{"slidesPerView":5,"spaceBetween":20},"1200":{"slidesPerView":6,"spaceBetween":16}}}'>
                            <div class="swiper-wrapper grid-container">
                                {{-- <div class="swiper-slide">
                                    <div class="position-relative text-decoration-none product-card">
                                        <div class="d-flex flex-column justify-content-between h-100">
                                            <div>
                                                <div class="border border-1 border-2002 rounded-3 position-relative mb-3">
                                                    <button
                                                        class="btn btn-outline-primary rounded-circle p-0 d-flex flex-center btn-wish z-index-2"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Add to wishlist"><span
                                                            class="far fa-heart"></span></button><img class="img-fluid"
                                                        src="	https://prium.github.io/phoenix/v1.2.0/assets/img/products/5.png" alt="" /></div><a
                                                    class="stretched-link text-decoration-none"
                                                    href="{{route('showProduct')}}">
                                                    <h6 class="mb-2 lh-sm line-clamp-3">Razer Kraken v3 x Wired 7.1
                                                        Surroung Sound Gaming headset</h6>
                                                </a>
                                                <p class="fs--1"><span class="fa fa-star text-warning"></span><span
                                                        class="fa fa-star text-warning"></span><span
                                                        class="fa fa-star text-warning"></span><span
                                                        class="fa fa-star text-warning"></span><span
                                                        class="fa fa-star text-warning"></span><span
                                                        class="text-500 fw-semi-bold ms-1">(59 {{__('people rated')}})</span></p>
                                            </div>
                                            <div>
                                                <h3 class="text-1100">$59.00</h3>
                                                <p class="text-700 fw-semi-bold fs--1">2 colors</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
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
                                    {{-- <div class="swiper-slide">
                                        <div class="position-relative text-decoration-none product-card">
                                            <div class="d-flex flex-column justify-content-between h-100">
                                                <div>
                                                    <div class="border border-1 border-2002 rounded-3 position-relative mb-3">
                                                        <button
                                                            class="btn btn-outline-primary rounded-circle p-0 d-flex flex-center btn-wish z-index-2"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to wishlist"><span
                                                                class="far fa-heart"></span></button><img class="img-fluid"
                                                            src="https://prium.github.io/phoenix/v1.2.0/assets/img/products/2.png" alt="" /></div>
                                                    <a class="stretched-link text-decoration-none"
                                                        href="{{route('showProduct')}}">
                                                        <h6 class="mb-2 lh-sm line-clamp-3">HORI Racing Wheel Apex for
                                                            PlayStation 4/3, and PC</h6>
                                                    </a>
                                                    <p class="fs--1"><span class="fa fa-star text-warning"></span><span
                                                            class="fa fa-star text-warning"></span><span
                                                            class="fa fa-star text-warning"></span><span
                                                            class="fa fa-star text-warning"></span><span
                                                            class="fa fa-star text-warning"></span><span
                                                            class="text-500 fw-semi-bold ms-1">(64 {{__('people rated')}})</span></p>
                                                </div>
                                                <div>
                                                    <h3 class="text-1100">$299.00</h3>
                                                    <p class="text-700 fw-semi-bold fs--1">1 colors</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="position-relative text-decoration-none product-card">
                                            <div class="d-flex flex-column justify-content-between h-100">
                                                <div>
                                                    <div class="border border-1 border-2002 rounded-3 position-relative mb-3">
                                                        <button
                                                            class="btn btn-outline-primary rounded-circle p-0 d-flex flex-center btn-wish z-index-2"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Remove from wishlist"><span
                                                                class="fas fa-heart"></span></button><img class="img-fluid"
                                                            src="	https://prium.github.io/phoenix/v1.2.0/assets/img/products/1.png" alt="" /><span
                                                            class="badge bg-success fs--2 product-verified-badge">Verified<span
                                                                class="fas fa-check ms-1"></span></span></div><a
                                                        class="stretched-link text-decoration-none"
                                                        href="{{route('showProduct')}}">
                                                        <h6 class="mb-2 lh-sm line-clamp-3">Amazfit T-Rex Pro Smart Watch with
                                                            GPS, Outdoor Fitness Watch for Men, Military Standard Certified</h6>
                                                    </a>
                                                    <p class="fs--1"><span class="fa fa-star text-warning"></span><span
                                                            class="fa fa-star text-warning"></span><span
                                                            class="fa fa-star text-warning"></span><span
                                                            class="fa fa-star text-warning"></span><span
                                                            class="fa fa-star text-warning"></span><span
                                                            class="text-500 fw-semi-bold ms-1">(32 {{__('people rated')}})</span></p>
                                                </div>
                                                <div>
                                                    <h3 class="text-1100">$20.00</h3>
                                                    <p class="text-success fw-bold fs--1">Deal time ends in 24 hours</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="position-relative text-decoration-none product-card">
                                            <div class="d-flex flex-column justify-content-between h-100">
                                                <div>
                                                    <div class="border border-1 border-2002 rounded-3 position-relative mb-3">
                                                        <button
                                                            class="btn btn-outline-primary rounded-circle p-0 d-flex flex-center btn-wish z-index-2"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to wishlist"><span
                                                                class="far fa-heart"></span></button><img class="img-fluid"
                                                            src="https://prium.github.io/phoenix/v1.2.0/assets/img/products/2.png" alt="" /></div>
                                                    <a class="stretched-link text-decoration-none"
                                                        href="{{route('showProduct')}}">
                                                        <h6 class="mb-2 lh-sm line-clamp-3">Apple AirPods Pro</h6>
                                                    </a>
                                                    <p class="fs--1"><span class="fa fa-star text-warning"></span><span
                                                            class="fa fa-star text-warning"></span><span
                                                            class="fa fa-star text-warning"></span><span
                                                            class="fa fa-star text-warning"></span><span
                                                            class="fa fa-star text-warning"></span><span
                                                            class="text-500 fw-semi-bold ms-1">(39 {{__('people rated')}})</span></p>
                                                </div>
                                                <div>
                                                    <h3 class="text-1100">$59.00</h3>
                                                    <p class="text-700 fw-semi-bold fs--1">3 colors</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                   
                               
                            </div>
                        </div>
                        <div class="swiper-nav">
                            <div class="swiper-button-next"><span class="fas fa-chevron-right nav-icon"></span></div>
                            <div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>
                        </div>
                    </div><a class="fw-bold d-md-none" href="#!">{{__('Explore more')}}<span
                            class="fas fa-chevron-right fs--1 ms-1"></span></a>
                </div>
                <div class="mb-6">
                    <div class="d-flex flex-between-center mb-3">
                        <h3>{{__('Best Offers')}}</h3><a class="fw-bold d-none d-md-block" href="#!">{{__('Explore more')}}<span
                                class="fas fa-chevron-right fs--1 ms-1"></span></a>
                    </div>
                  
                </div>
                <div class="row flex-center my-11 gy-6">
                    <div class="col-auto"><img src="https://prium.github.io/phoenix/v1.2.0/assets/img/products/2.png" alt="" width="305"
                            height="400" /></div>
                    <div class="col-auto">
                        <div class="text-center text-lg-start">
                            <h3 class="text-1000 mb-2"><span class="fw-semi-bold">Want to have the </span>ultimate
                                customer experience?</h3>
                            <h1 class="display-3 fw-semi-bold mb-4">Become a <span class="text-primary fw-bolder">member
                                </span>today!</h1><a class="btn btn-lg btn-primary px-7"
                                href=""><span
                                    class="fas fa-chevron-left me-2"></span>Sign up</a>
                        </div>
                    </div>
                </div>
            </div><!-- end of .container-->
        </section><!-- <section> close ============================-->
        <!-- ============================================-->

    </div>
@endsection
