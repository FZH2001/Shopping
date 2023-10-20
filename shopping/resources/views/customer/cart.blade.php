@extends('layouts.cust_links')
@section('content')
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
      <section class="">
        <div class="container-small cart">
          
          <div class="row g-5">
            <div class="col-12 col-lg-8">
              <div id="cartTable" data-list='{"valueNames":["products","color","size","price","quantity","total"],"page":10}'>
                <div class="d-flex justify-content-between" >
                  <h2 class="mb-3">{{__('Cart')}}</h2>
                  <form action="{{route('cart.clear',Auth::user()->id)}}" method="post">
                    @csrf
                    @method('delete')
                  <button class="btn btn-danger ml-10" style="align-self:flex-start;justify-self:end;margin-left:26rem" type="submit" >{{__('Clear Cart')}} </button>
                  </form>
                </div>
                <div class="table-responsive scrollbar mx-n1 px-1">
                  <table class="table fs--1 mb-0 border-top border-200">
                    <thead>
                      <tr>
                        <th class="sort white-space-nowrap align-middle fs--2" scope="col"></th>
                        <th class="sort white-space-nowrap align-middle" scope="col" style="min-width:100px;">{{__('Product')}}</th>
                        <th class="sort align-middle" scope="col" style="width:80px;">{{__('Description')}}</th>
                        <th class="sort align-middle text-end" scope="col" style="width:300px;">{{__('Price')}}</th>
                        <th class="sort align-middle ps-5" scope="col" style="width:200px;">{{__('Quantity')}}</th>
                        <th class="sort align-middle text-end" scope="col" style="width:100px;">Total</th>
                        <th class="sort text-end align-middle pe-0" scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody class="list" id="table-latest-review-body">
                      @foreach($cartItems as $cartItem)
                      <tr class="cart-table-row btn-reveal-trigger">
                        <td class="align-middle white-space-nowrap py-0"><img class="rounded-circle" src="{{asset('images/'.$cartItem->model->image)}}" alt="image" width="40" height="40" /></td>
                        <td class="products align-middle"><a class="fw-semi-bold mb-0 line-clamp-2" href="{{url('showItem/'.$cartItem->model->id)}}">{{$cartItem->name}}</a></td>
                        <td class="color align-middle white-space-nowrap fs--1 text-900">{{$cartItem->model->description}}</td>
                        <td class="price align-middle text-900 fs--1 fw-semi-bold text-end">${{$cartItem->model->price}}</td>
                        <td class="quantity align-middle fs-0 ps-5 d-flex">
                          <form action="{{url('updatecart/'.Auth::user()->id.'/'.$cartItem->rowId)}}" class="d-flex" method="post">
                            @csrf
                            @method('put')
                          <input class="form-control text-center bg-transparent bItem-1 px-0" name="qty" type="number" min="1" style="width:3rem" value="{{$cartItem->qty}}" aria-label="Amount (to the nearest dollar)" />
                          <button class="btn btn-sm btn-phoenix-secondary fs--2" style="margin:4px" type="submit"><span class="fas fa-pen"></span></button>
                          </form>
                        </td>
                        <td class="total align-middle fw-bold text-1000 text-end">${{$cartItem->model->price * $cartItem->qty}}</td>
                        <td class="align-middle white-space-nowrap text-end pe-0 ps-3">
                          <form action="{{url('cartlist/'.Auth::user()->id . '/'. $cartItem->rowId)}}" method="POST">
                            @csrf
                            @method('delete')
                           <button class="btn btn-sm btn-phoenix-secondary fs--2" type="submit">
                            <span class="fas fa-trash"></span></button>
                          </form>
                          </td>
                      </tr>
                      @endforeach
                      
                      <tr class="cart-table-row btn-reveal-trigger">
                        <td class="text-1100 fw-semi-bold ps-0 fs-0" colspan="6">{{__('Items subtotal')}} :</td>
                        <td class="text-1100 fw-bold text-end fs-0">${{Cart::instance($id)->priceTotal()}}</td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-between-center mb-3">
                    <h3 class="card-title mb-0">{{__('Summary')}}</h3>
                  </div>
                 
                  <div>
                    <div class="d-flex justify-content-between">
                      <p class="text-900 fw-semi-bold">{{__('Items subtotal')}} :</p>
                      <p class="text-1100 fw-semi-bold">${{Cart::instance($id)->priceTotal()}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                      <p class="text-900 fw-semi-bold">{{__('Discount')}} :</p>
                      @if (Cart::instance(Auth::user()->id)->GetPercentDiscount()) 
                      <p class="text-warning fw-semi-bold">-${{Cart::instance($id)->discount()}}</p>
                      @elseif(Cart::instance(Auth::user()->id)->GetFixedDiscount())
                      <p class="text-warning fw-semi-bold">-${{Cart::instance($id)->GetFixedDiscount()}}</p>
                      @else
                      <p class="text-warning fw-semi-bold">-$0.00</p>
                      @endif
                    </div>
                    <div class="d-flex justify-content-between">
                      <p class="text-900 fw-semi-bold">Tax :</p>
                      <p class="text-1100 fw-semi-bold">${{Cart::instance($id)->tax()}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                      <p class="text-900 fw-semi-bold">Subtotal :</p>
                      <p class="text-1100 fw-semi-bold">${{Cart::instance($id)->subtotal()}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                      <p class="text-900 fw-semi-bold">{{__('Shipping Cost')}} :</p>
                      <p class="text-1100 fw-semi-bold">$30</p>
                    </div>
                  </div>
                  @if (!session()->get('used'))
                  <div>{{__('Choose your coupon type')}}:</div>
                  <br>
                <form method="post" action="{{route('coupon.use')}}">
                  @csrf
                  @method('post')
                  <select class="form-select mb-3" aria-label="delivery type" name="type">
                    <option value="percentage">Percentage</option>
                    <option value="fixed">Fixed</option>
                  </select>
                  <div class="input-group mb-3"><input class="form-control" type="text" name="code" placeholder="Voucher" />
                    <button class="btn btn-phoenix-primary px-5" type="submit">Apply</button>
                  </div>
                </form>
                @endif
                  <div class="d-flex justify-content-between border-y border-dashed py-3 mb-4">
                    <h4 class="mb-0 text-success fw-semi-bold">Total :</h4>
                    @if(Cart::instance(Auth::user()->id)->GetPercentDiscount())
                    <h4 class="mb- text-success fw-semi-bold">${{Cart::instance($id)->total('2','.','')+30}}</h4>
                    @elseif(Cart::instance(Auth::user()->id)->GetFixedDiscount())
                    <h4 class="mb- text-success fw-semi-bold">${{Cart::instance($id)->total('2','.','')-Cart::instance(Auth::user()->id)->GetFixedDiscount()+30}}</h4>
                    @else
                    <h4 class="mb- text-success fw-semi-bold">${{Cart::instance($id)->total('2','.','')+30}}</h4>

                    @endif
                  </div>
                 
                  <a class="btn btn-primary w-100" href="{{route('checkout')}}">{{__('Checkout')}}<span class="fas fa-chevron-right ms-1 fs--2"></span></a>
                  
                </div>
              </div>
            </div>
          </div>
        </div><!-- end of .container-->
      </section><!-- <section> close ============================-->
        @endsection



    