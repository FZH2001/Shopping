
@extends('layouts.links')
@section('content')

        <div class="content">
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
          <div class="mb-9">
            <div class="row g-3 mb-4">
              <div class="col-auto">
                <h2 class="mb-0">{{__('Products')}}</h2>
              </div>
            </div>
            <div id="products" data-list='{"valueNames":["product","price","category","tags","vendor","time"],"page":10,"pagination":true}'>
              <div class="mb-4">
                <div class="row g-3">
                  <div class="col col-xl-auto">
                    <div class="search-box w-100" style="max-width:30rem;">
                      <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control form-control search-input search" type="search" placeholder="{{__('Search')}} {{__('products')}}" aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>
                      </form>
                    </div>
                  </div>
   
                  <div class="col-lg-auto col-xxl text-xxl-end mt-3">
                    <button class="btn btn-link text-900 me-3 px-0">
                     
    
                        <a href="{{route('product.add')}}"><button class="btn btn-primary"  >
                          <span class="fas fa-plus me-2"></span>{{__('Add new product')}}</button></a>
                        
                        </div>
                </div>
              </div>
              <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
                <div class="table-responsive scrollbar mx-n1 px-1">
                  <table class="table fs--1 mb-0">
                    <thead>
                      <tr>
                        <th class="white-space-nowrap fs--1 align-middle ps-0">
                          <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox" /></div>
                        </th>
                        <th class="sort white-space-nowrap align-middle fs--2" scope="col"></th>
                        <th class="sort white-space-nowrap align-middle" scope="col" style="min-width:200px;" data-sort="product">{{__('Product name')}}</th>
                        <th class="sort align-middle text-end" scope="col" data-sort="price" style="width:80px;">{{__('Price')}}</th>
                        <th class="sort align-middle text-end" scope="col" data-sort="price" style="width:80px;">{{__('Quantity')}}</th>

                        <th class="sort align-middle ps-4" scope="col" data-sort="category" style="width:150px;">{{__('Category')}}</th>
                        <th class="sort align-middle" scope="col" data-sort="time" style="width:250px;">{{__('Published on')}}</th>
                        <th class="sort text-center align-middle pe-0" scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody class="list" id="table-latest-review-body">
                      @foreach($products as $product)
                      <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs--1 align-middle ps-0">
                          <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox" /></div>
                        </td>
                        <td class="align-middle white-space-nowrap py-0"><img src="{{asset('images/'.$product->image)}}" alt="" width="53" /></td>
                        <td class="product align-middle"><a class="fw-semi-bold mb-0" href="#!">{{$product->description}}</a></td>
                        <td class="price align-middle white-space-nowrap text-end fw-bold text-700">${{$product->price}}</td>
                        <td class="price align-middle white-space-nowrap text-end fw-bold text-700">{{$product->qty}}</td>

                        <td class="category align-middle white-space-nowrap text-600 fs--1 ps-4 fw-semi-bold">{{$product->category}}</td>
                        <td class="time align-middle white-space-nowrap text-600">{{$product->created_at}}</td>
                        <td class="align-middle white-space-nowrap text-end pe-0">
                          <form class="d-inline" action="{{route('product.show',$product->id)}}" method="post">
                            @csrf
                              <button class="btn btn-sm btn-phoenix-secondary me-1 fs--2" type="submit"><span class="fas fa-eye"></span></button>
                          </form>
                          <form class="d-inline" action="{{route('edit',$product->id)}}" method="post">
                            @csrf
                            <button class="btn btn-sm btn-phoenix-secondary fs--2" type="submit"><span class="fas fa-pen"></span></button>
                          </form>
                              <form class="d-inline" action="{{route('product.delete',$product->id)}}" method="post">
                                @csrf
                                @method('delete')
                              <button class="btn btn-sm btn-phoenix-secondary fs--2" type="submit"><span class="fas fa-trash"></span></button>
                              </form>
                        </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>
                <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                  
                
                   
                    {!! $products->links() !!}
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

   