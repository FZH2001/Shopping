@extends('layouts.links')
@section('content')
<div class="content ">
  <div class="mb-9 ">

        <section class="pl-20 ">
          <div class="content d-flex " >
              <div class=" col-12 col-md-10 col-lg-12 col-xl-10">
                  <img src="/images/{{$product->image}}" style="float: left;margin-right:4rem width:300px;height:300px;padding:2rem;padding-top:0">
                  <div >
                  <div class="d-flex flex-wrap">
                    <div class="me-2"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span></div>
                    <p class="text-primary fw-semi-bold mb-2">6548 {{__('people rated')}} and reviewed </p>
                  </div>
                  <h1 class="mb-3 lh-sm">{{$product->name}}</h1>

                  <h3 class="mb-3 lh-sm"><a class="fw-semi-bold" href="#!">{{$product->description}}</a></h3>
                  <div class="d-flex flex-wrap align-items-start mb-3"><span class="badge bg-success fs--1 rounded-pill me-2">#1 Best seller</span><a class="fw-semi-bold" href="#!">in Phoenix sell analytics 2021</a></div>
                  <div class="d-flex flex-wrap align-items-center">
                    <h2 class="me-3">${{$product->price}}.00</h2>
                    <p class="text-500 text-decoration-line-through fs-2 mb-0 me-3">${{$product->price +100}}.00</p>
                    <p class="text-warning fw-bolder fs-2 mb-0">10% off</p>
                  </div>
                  @if($product->qty)
                  <p class="text-success fw-semi-bold fs-1 mb-2">In stock</p>
                  @else
                  <p class="text-danger fw-semi-bold fs-1 mb-2">Out of stock</p>
@endif
                  <p class="mb-2 text-800"><strong class="text-1000">Do you want it on Saturday, July 29th?</strong> Choose <strong class="text-1000">Saturday Delivery </strong>at checkout if you want your order delivered within 12 hours 43 minutes, <a class="fw-bold" href="#!">Details. </a><strong class="text-1000">Gift wrapping is available.</strong></p>
                  <p class="text-danger fw-bold mb-5 mb-lg-0">Special offer ends in 23:00:45 hours</p>
                </div>
                <div>
               </div>
              </div>
          
          </div>
          </div>
        </div>
          </div><!-- end of .container-->
        </section><!-- <section> close ============================-->
       



     
      <footer class="footer">
        <div class="row g-0 justify-content-between align-items-center h-100 mb-3">
          <div class="col-12 col-sm-auto text-center">
            <p class="mb-0 mt-2 mt-sm-0 text-900">Thank you for creating with Phoenix<span class="d-none d-sm-inline-block"></span><span class="mx-1">|</span><br class="d-sm-none" />2022 &copy; <a href="https://themewagon.com">Themewagon</a></p>
          </div>
          <div class="col-12 col-sm-auto text-center">
            <p class="mb-0 text-600">v1.2.0</p>
          </div>
        </div>
      </footer>
@endsection 