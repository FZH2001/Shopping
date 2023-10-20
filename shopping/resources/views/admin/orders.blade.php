
@extends('layouts.links')
@section('content')
        <div class="content">

          <div class="mb-9">
            <div class="row g-3 mb-4">
              <div class="col-auto">
                <h2 class="mb-0">{{__('Orders')}}</h2>
              </div>
            </div>
            <div id="orderTable" data-list='{"valueNames":["order","total","customer","payment_status","fulfilment_status","delivery_type","date"],"page":10,"pagination":true}'>
              <div class="mb-4">
                <div class="row g-2">
                  <div class="col col-xl-auto">
                    <div class="search-box w-100" style="max-width:30rem;">
                      <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control form-control search-input search" type="search" placeholder="Search orders" aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>
                      </form>
                    </div>
                  </div>
           
                </div>
              </div>
              <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
                <div class="table-responsive scrollbar mx-n1 px-1">
                  <table class="table table-sm fs--1 mb-0">
                    <thead>
                      <tr>
                        <th class="white-space-nowrap fs--1 align-middle ps-0" style="width:26px;">
                          <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox" /></div>
                        </th>
                        <th class="sort white-space-nowrap align-middle pe-3" scope="col" data-sort="order" style="width:5%;">{{__('Order')}}</th>
                        <th class="sort align-middle text-end" scope="col" data-sort="total" style="width:10%;">Total</th>

                        <th class="sort align-middle text-center pe-0" scope="col" data-sort="date">Date</th>

                        <th class="sort align-middle ps-8" scope="col" data-sort="customer" style="width:28%;">{{__('Customer')}}</th>
                        <th class="sort align-middle pe-3" scope="col" data-sort="payment_status" style="width:10%;">{{__('Discount')}}</th>
                        <th class="sort align-middle text-start" scope="col" data-sort="delivery_type" style="width:20%;">Action</th>

                      </tr>
                    </thead>
                    <tbody class="list" id="table-latest-review-body">
              @foreach($orders as $order)
                      <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs--1 align-middle px-0 py-3">
                          <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox" /></div>
                        </td>
                        <td class="order align-middle white-space-nowrap py-0"><a class="fw-semi-bold" href="#!">#{{$order->id}}</a></td>
                        <td class="total align-middle text-end fw-semi-bold">${{$order->total}}</td>
                        <td class="date align-middle white-space-nowrap text-700 fs--1 ps-4 text-end">{{$order->created_at}}</td>

                        <td class="customer align-middle white-space-nowrap ps-8"><a class="d-flex align-items-center" href="#!">
                            
                              <div class="avatar avatar-m"><img class="rounded-circle" src="{{asset('storage/'.$order->user->profile_photo_path)}}" alt="" /></div>
                     
                            <h6 class="mb-0 ms-3 text-900">{{$order->user->name}}</h6>
                          </a></td>
                          @if($order->discount)
                        <td class="payment_status align-middle white-space-nowrap text-start fw-bold text-700"><span class="badge badge-phoenix fs--2 badge-phoenix-success"><span class="badge-label">Applied</span><span class="ms-1" data-feather="x" style="height:12.8px;width:12.8px;"></span></span></td>
                        @else
                        <td class="payment_status align-middle white-space-nowrap text-start fw-bold text-700"><span class="badge badge-phoenix fs--2 badge-phoenix-danger"><span class="badge-label">Not applied</span><span class="ms-1" data-feather="x" style="height:12.8px;width:12.8px;"></span></span></td>
@endif
                       <td class="delivery_type align-middle white-space-nowrap text-900 fs--1 text-start">
                        <form class="d-inline" action="{{route('order.show',$order->id)}}" method="post">
                          @csrf
                          <button class="btn btn-sm btn-phoenix-secondary me-1 fs--2" type="submit"><span class="fas fa-eye"></span></button>
                        </form>
                        <form class="d-inline" action="{{route('order.show',$order->id)}}" method="post">
                          @csrf
                          <button class="btn btn-sm btn-phoenix-secondary fs--2"><span class="fas fa-pen"></span></button></div>
                        </form>
                        <form class="d-inline" action="{{route('order.delete',$order->id)}}" method="post">
                          @csrf
                          @method('delete')
                          <button class="btn btn-sm btn-phoenix-secondary fs--2" type="submit"><span class="fas fa-trash"></span></button></div>
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
     
    