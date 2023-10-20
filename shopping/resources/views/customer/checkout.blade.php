@extends('layouts.cust_links')
@section('content')
 
      <section class="pt-5 pb-9">
        @if ($message = Session::get('message'))
<div class="badge badge-phoenix text-center m-3 fs--2 badge-phoenix-success" style="width:100%;height:1 rem">
    <p class="p-2 ">{{ __($message) }} {{-- $coupon->value --}}</p>
</div>
@endif
@if ($error = Session::get('error'))
<div class="badge badge-phoenix fs--2 text-start m-3 badge-phoenix-danger" style="width:100%;height:1 rem;vertical-align:middle">
    <p class="p-2 " > {{ __($error) }} {{-- $coupon->value --}}</p>
</div>
@endif
        <div class="container-small">
          <h2 class="mb-5">{{__('Checkout')}}</h2>
          <div class="row">
            <div class="col-lg-7 col-xl-8">
              
                <div class="d-flex align-items-end">
                  <h3 class="mb-0 me-3">Shipping Details</h3><button class="btn btn-link p-0" type="button">Edit</button>
                </div>
                <table class="table table-borderless mt-4">
                  <tbody>
                    <tr>
                      <td class="py-2 ps-0">
                        <div class="d-flex"><span class="fs-5 me-2" data-feather="user" style="height:16px; width:16px;"> </span>
                          <h5 class="lh-sm me-4">Name</h5>
                        </div>
                      </td>
                      <td class="py-2 fw-bold lh-sm">:</td>
                      <td class="py-2 px-3">
                        <h5 class="lh-sm fw-normal text-800">{{Auth::user()->name}}</h5>
                      </td>
                    </tr>
                    <tr>
                      <td class="py-2 ps-0">
                        <div class="d-flex"><span class="fs-5 me-2" data-feather="home" style="height:16px; width:16px;"> </span>
                          <h5 class="lh-sm me-4">Address</h5>
                        </div>
                      </td>
                      <td class="py-2 fw-bold lh-sm">:</td>
                      <td class="py-2 px-3">
                        <h5 class="lh-lg fw-normal text-800">Apt: 6/B, 192 Edsel Road, Van Nuys <br> California, USA 96580</h5>
                      </td>
                    </tr>
                    <tr>
                      <td class="py-2 ps-0">
                        <div class="d-flex"><span class="fs-5 me-2" data-feather="phone" style="height:16px; width:16px;"> </span>
                          <h5 class="lh-sm me-4">Phone</h5>
                        </div>
                      </td>
                      <td class="py-2 fw-bold lh-sm">: </td>
                      <td class="py-2 px-3">
                        <h5 class="lh-sm fw-normal text-800">818-414-4092</h5>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <hr class="my-6">
 
          
  
                <div class="row g-2 mb-5 mb-lg-0">
                  <div class="col-md-8 col-lg-9 d-grid">
                    @if(Cart::instance($id)->count())
                    <form action="{{url('/ordercreate')}}" method="post" >
                      @csrf
                    <button class="btn btn-primary" type="submit">{{__('Order now')}}</button>
                    </form>
                    @endif
                  </div>
                </div>
             
            </div>
            <div class="col-lg-5 col-xl-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <h3 class="mb-0">{{__('Summary')}}</h3>
                  </div>
                  <div class="border-dashed border-bottom mt-4">
                    <div class="mx-n2">
                      @foreach($cartItems as $Item)
                      <div class="row align-items-center mb-2 g-3">
                        <div class="col-8">
                          <div class="d-flex align-items-center"><img class="me-2 ms-1" src="images/{{$Item->model->image}}" width="40" alt="" />
                            <h6 class="fw-semi-bold text-1000 lh-base">{{$Item->model->description}}</h6>
                          </div>
                        </div>
                        <div class="col-2">
                          <h6 class="fs--2 mb-0">x{{$Item->qty}}</h6>
                        </div>
                        <div class="col-2">
                          <h6 class="mb-0 fw-semi-bold text-end text-lg-start">${{$Item->model->price}}</h6>
                        </div>
                      </div>
                     @endforeach
                    </div>
                  </div>
                  <div class="border-dashed border-bottom mt-4">
                    <div class="d-flex justify-content-between mb-2">
                      <h5 class="text-900 fw-semi-bold">{{__('Items subtotal')}}: </h5>
                      <h5 class="text-900 fw-semi-bold">${{Cart::instance($id)->priceTotal()}}</h5>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                      <h5 class="text-900 fw-semi-bold">Discount: </h5>
                      @if(Cart::instance($id)->GetPercentDiscount())
                      <h5 class="text-danger fw-semi-bold">-${{Cart::instance($id)->discount()}}</h5>
                      @elseif(Cart::instance($id)->GetFixedDiscount())
                      <h5 class="text-danger fw-semi-bold">-${{Cart::instance($id)->GetFixedDiscount()}}</h5>

                      @else
                      <h5 class="text-danger fw-semi-bold">-$0.00</h5>

                      @endif
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                      <h5 class="text-900 fw-semi-bold">Tax: </h5>
                      <h5 class="text-900 fw-semi-bold">${{Cart::instance($id)->tax()}}</h5>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                      <h5 class="text-900 fw-semi-bold">Subtotal </h5>
                      <h5 class="text-900 fw-semi-bold">${{Cart::instance($id)->subtotal()}}</h5>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                      <h5 class="text-900 fw-semi-bold">{{__('Shipping Cost')}} </h5>
                      <h5 class="text-900 fw-semi-bold">$30 </h5>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between border-dashed-y pt-3">
                    <h4 class="mb-0">Total :</h4>
                    @if(Cart::instance($id)->GetFixedDiscount())
                    <h4 class="mb-0">${{Cart::instance($id)->total('2','.','')-Cart::instance($id)->GetFixedDiscount()}}</h4>
                    @else
                    <h4 class="mb-0">${{Cart::instance($id)->total()}}</h4>
                    @endif

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end of .container-->
      </section><!-- <section> close ============================-->
    
@endsection