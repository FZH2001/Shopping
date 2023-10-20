@extends('layouts.cust_links')
@section('content')
        <div class="content">
          <div class="mb-9">
            
            <div class="row g-5">
              <div class="col-12 col-xl-8 col-xxl-9">
                <div id="orderTable" data-list='{"valueNames":["products","color","size","price","quantity","total"],"page":10}'>
                  <div class="table-responsive scrollbar mx-n1 px-1">
                    <table class="table fs--1 mb-0 border-top border-200">
                      <thead>
                        <tr>
                          <th class="sort white-space-nowrap align-middle fs--2" scope="col"></th>
                          <th class="sort white-space-nowrap align-middle" scope="col" style="min-width:200px;" data-sort="products">{{__('Product')}}</th>


                          <th class="sort align-middle text-center" scope="col" data-sort="price" style="width:100px;">{{__('Price')}}</th>
                          <th class="sort align-middle text-center" scope="col" data-sort="quantity" style="width:100px;">{{__('Quantity')}}</th>
                          <th class="sort align-middle text-center" scope="col" data-sort="total" style="width:150px;">Total</th>


                        </tr>
                      </thead>
                      <tbody class="list" id="table-latest-review-body">
                        
                        {{-- <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                          <td class="align-middle white-space-nowrap py-0"><img src="	https://prium.github.io/phoenix/v1.2.0/assets/img//products/1.png" alt="" width="53" /></td>
                          <td class="products align-middle"><a class="fw-semi-bold mb-0" href="#!">Fitbit Sense Advanced Smartwatch with Tools for Heart Health, Stress Manag...</a></td>
                          <td class="price align-middle text-900 fw-semi-bold text-end">$199</td>
                          <td class="quantity align-middle text-end">2</td>
                          <td class="total align-middle fw-bold text-1000 text-end">$398</td>
                        </tr> --}}
                        @foreach($order->orderItems as $Item)
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                          <td class="align-middle white-space-nowrap py-0"><img class="rounded-circle" src="{{asset('images/'.$Item->image)}}" alt="image" width="40" height="40" /></td>
                          <td class="products align-middle"><a class="fw-semi-bold mb-0" href="#!">{{$Item->description}}</a></td>
                          <td class="price align-middle text-900 fw-semi-bold text-center">${{$Item->price}}</td>
                          <td class="quantity align-middle text-center">
                            {{$Item->pivot->qty}}                          </td>
                          <td class="total align-middle fw-bold text-1000 text-center">${{$Item->pivot->qty * $Item->price}}</td>
                   
                        </tr>
                        @endforeach
                        {{-- <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                          <td class="align-middle white-space-nowrap py-0"><img src="	https://prium.github.io/phoenix/v1.2.0/assets/img//products/1.png" alt="" width="53" /></td>
                          <td class="products align-middle"><a class="fw-semi-bold mb-0" href="#!">Apple MacBook Pro 13 inch-M1-8/256GB-space</a></td>
                          <td class="price align-middle text-900 fw-semi-bold text-end">$65</td>
                          <td class="quantity align-middle text-end">2</td>
                          <td class="total align-middle fw-bold text-1000 text-end">$130</td>
                        </tr> --}}
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="d-flex flex-between-center py-3 border-bottom mb-7">
                  <p class="text-1100 fw-semi-bold lh-sm mb-0 mr-5">{{__('Items subtotal')}} :</p>
                  <p class="text-1100 fw-bold lh-sm mb-0">${{$order->total}}</p>
                </div>
    
              </div>
              <div class="col-12 col-xl-4 col-xxl-3">
                <div class="row mb-5">
                  <div class="col-12 col-md-6 col-lg-12">
                    <div class="card mb-3">
                      <div class="card-body">
                        <h3 class="card-title mb-4">{{__('Summary')}}</h3>
                        <div>
                          <div class="d-flex justify-content-between">
                            <p class="text-900 fw-semi-bold">{{__('Items subtotal')}} :</p>
                            <p class="text-1100 fw-semi-bold">${{$order->total}}</p>
                          </div>
                          <div class="d-flex justify-content-between">
                            <p class="text-900 fw-semi-bold">{{__('Discount')}} :</p>
                            <p class="text-danger fw-semi-bold">-${{$order->discount}}</p>
                          </div>
                          <div class="d-flex justify-content-between">
                            <p class="text-900 fw-semi-bold">Tax :</p>
                            <p class="text-1100 fw-semi-bold">${{$order->tax}}</p>
                          </div>
                          <div class="d-flex justify-content-between">
                            <p class="text-900 fw-semi-bold">Subtotal :</p>
                            <p class="text-1100 fw-semi-bold">${{$order->total + $order->tax}}</p>
                          </div>
                          <div class="d-flex justify-content-between">
                            <p class="text-900 fw-semi-bold">{{__('Shipping Cost')}} :</p>
                            <p class="text-1100 fw-semi-bold">$30</p>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between border-dashed-top pt-4">
                          <h4 class="mb-0">Total :</h4>
                          <h4 class="mb-0">${{$order->newTotal  + 30}}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <footer class="footer position-absolute">
            <div class="row g-0 justify-content-between align-items-center h-100 mb-3">
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 mt-2 mt-sm-0 text-900">Thank you for creating with Phoenix<span class="d-none d-sm-inline-block"></span><span class="mx-1">|</span><br class="d-sm-none" />2022 &copy; <a href="https://themewagon.com">Themewagon</a></p>
              </div>
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600">v1.2.0</p>
              </div>
            </div>
          </footer>
        </div>
@endsection
   