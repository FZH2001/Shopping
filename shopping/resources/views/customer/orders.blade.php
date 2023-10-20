
@extends('layouts.cust_links')
@section('content')
        <div class="content">

          <div class="mb-9">
            <div class="row g-3 mb-4">
              <div class="col-auto">
                <h2 class="mb-0">{{__('Orders')}}</h2>
              </div>
            </div>
            <div id="orderTable" data-list='{"valueNames":["order","total","customer","payment_status","fulfilment_status","delivery_type","date"],"page":10,"pagination":true}'>
   
              <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1" style="border-radius: 1rem">
                <div class="table-responsive scrollbar mx-n1 px-1">
                  <table class="table table-sm fs--1 mb-0" >
                    <thead style="padding:1rem">
                      <tr>
                        <th class="sort align-middle text-center pe-0" scope="col" data-sort="date" style="width:10%;">Date</th>
                        <th class="sort align-middle text-center pe-0" scope="col" data-sort="date" style="width:20%;">{{__('Content')}}</th>
                        <th class="sort align-middle text-center pe-0" scope="col" data-sort="date" style="width:10%;">{{__('Total price')}}</th>
                        <th class="sort align-middle text-center pe-0" scope="col" data-sort="date" style="width:10%;">{{__('Discount')}}</th>

                        <th class="sort align-middle text-center" scope="col" data-sort="total" style="width:5%;">{{__('New Total')}}</th>

                       

                        <th class="sort align-middle text-center pe-3" scope="col" data-sort="payment_status" style="width:10%;">{{__('Delivery')}}</th>
                        <th class="sort align-middle text-start" scope="col" data-sort="delivery_type" style="width:20%;">{{__('See order')}}</th>

                      </tr>
                    </thead>
                    <tbody class="list" id="table-latest-review-body">
              @foreach($orders as $order)
                      <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="date align-middle white-space-nowrap text-700 fs--1 ps-4 text-center">{{$order->created_at}}</td>
                        <td class="date align-middle white-space-nowrap text-700 fs--1 ps-4 text-start">
                            <ul >
                            @foreach($order->orderItems as $Item) 
                           <li> {{$Item->pivot->qty}} {{$Item->name}}</li>
                           @endforeach
                        </ul>
                        </td>
                        <td class="total align-middle text-center fw-semi-bold">${{$order->total}}</td>
                        <td class="total align-middle text-center fw-semi-bold">${{$order->discount}}</td>

                        <td class="total align-middle text-center fw-semi-bold">${{$order->newTotal}}</td>

                        {{-- <td class="customer align-middle white-space-nowrap ps-8"><a class="d-flex align-items-center" href="#!">
                            
                              <div class="avatar avatar-m"><img class="rounded-circle" src="{{asset('storage/'.$order->user->profile_photo_path)}}" alt="" /></div>
                     
                            <h6 class="mb-0 ms-3 text-900">{{$order->user->name}}</h6>
                          </a></td> --}}
                          @if($order->paid)
                        <td class="payment_status align-middle white-space-nowrap text-center fw-bold text-700"><span class="badge badge-phoenix fs--2 badge-phoenix-success"><span class="badge-label">{{__('Received')}}</span><span class="ms-1" data-feather="x" style="height:12.8px;width:12.8px;"></span></span></td>
                        @else
                        <td class="payment_status align-middle white-space-nowrap text-center fw-bold text-700"><span class="badge badge-phoenix fs--2 badge-phoenix-warning"><span class="badge-label">{{__('In way')}}</span><span class="ms-1" data-feather="x" style="height:12.8px;width:12.8px;"></span></span></td>
@endif
                       <td class="delivery_type align-middle white-space-nowrap text-900 fs--1 text-start">
                        <form class="d-inline" action="{{route('showMyorder',$order->id)}}" method="post">
                          @csrf
                          <button class="btn btn-sm btn-phoenix-secondary me-1 fs--2" type="submit"><span class="fas fa-eye"></span></button>
                        </form>
                        
                      </td>

                      </tr>
@endforeach
  

                    </tbody>
                  </table>
                </div>
                <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                  <div class="col-auto d-flex">
                    <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p><a class="fw-semi-bold" href="#!" data-list-view="*">{{__('View all')}}<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                  </div>
                  <div class="col-auto d-flex"><button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                    <ul class="mb-0 pagination"></ul><button class="page-link" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
@endsection
     
    