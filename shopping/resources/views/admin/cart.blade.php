@extends('layouts.links')
@section('content')

        <div class="content">
          <div class="mb-9">
            <h2 class="mb-0">{{__('Cart')}}<span>#32</span></h2>
            <div class="d-flex flex-wrap flex-between-center mb-1">
              <p class="text-800 lh-sm mb-0">{{__('Customer')}} ID : <a class="fw-bold" href="#!"> {{$id}}</a></p>
              
            </div>
            <div class="row g-5">
               
              <div class="col-12 col-xl-8 col-xxl-9">
                <div class="d-flex justify-content-between m-4"> 
                  <form  action="{{route('cart.clear',$id)}}" method="post">
                    @csrf
                    @method('delete')
                  <button class="btn btn-danger "  type="submit" >{{__('Clear Cart')}} </button>
                  </form>                
                  <button class="btn btn-success ml-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter des produits</button>
                </div>
                <div id="ItemTable" data-list='{"valueNames":["products","color","size","price","quantity","total"],"page":10}'>
                  <div class="table-responsive scrollbar mx-n1 px-1">
                    <table class="table fs--1 mb-0 bItem-top bItem-200">
                      <thead>
                        <tr>
                          <th class="sort white-space-nowrap align-middle fs--2" scope="col"></th>
                          <th class="sort white-space-nowrap align-middle" scope="col" style="min-width:150px;" data-sort="products">PRODUCT</th>


                          <th class="sort align-middle text-center" scope="col" data-sort="price" style="width:100px;">PRICE</th>
                          <th class="sort align-middle text-center" scope="col" data-sort="quantity" style="width:100px;">QUANTITY</th>
                          <th class="sort align-middle text-center" scope="col" data-sort="total" style="width:150px;">TOTAL</th>
                          <th class="sort align-middle text-center" scope="col" data-sort="total" style="width:100px;">ACTION</th>


                        </tr>
                      </thead>
                      <tbody class="list" id="table-latest-review-body">
                        @foreach($cartItems as $Item)
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                          <td class="align-middle white-space-nowrap py-0"><img class="rounded-circle" src="{{asset('images/'.$Item->model->image)}}" alt="image" width="40" height="40" /></td>
                          <td class="products align-middle">
                            <p class="text-1100 fw-bold lh-sm mb-0">{{$Item->model->name}}</p>

                            <a class="fw-semi-bold mb-0" href="#!">{{$Item->model->description}}</a>
                        </td>
                          <td class="price align-middle text-900 fw-semi-bold text-center">${{$Item->price}}</td>
                          <td class="quantity align-middle text-end d-flex justify-items-around">
                            <form action="{{url('updatecart/'.$id.'/'.$Item->rowId)}}" class="d-flex" method="post">
                                @csrf
                                @method('put')
                            <input class="form-control text-center  bg-transparent bItem-1 px-0" name="qty" type="number" min="1" style="width:3rem" value="{{$Item->qty}}" aria-label="Amount (to the nearest dollar)" />
                            <button class="btn btn-sm btn-phoenix-secondary fs--2" style="margin:4px" type="submit"><span class="fas fa-pen"></span></button>
                            </form>
                          </td>
                          <td class="total align-middle fw-bold text-1000 text-center">${{$Item->qty * $Item->price}}</td>
                          <td class="total align-middle fw-bold text-1000 text-center">
                            <form action="{{url('cartlist/'.$id . '/'. $Item->rowId)}}" method="POST">
                                @csrf
                                @method('delete')
                          <button class="btn btn-sm btn-phoenix-secondary fs--2" type="submit"><span class="fas fa-trash"></span></button>
                          </form>
                          </td>
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
                <div class="d-flex flex-between-center py-3 bItem-bottom mb-7">
                  <p class="text-1100 fw-semi-bold lh-sm mb-0">{{__('Items subtotal')}} :</p>
                  <p class="text-1100 fw-bold lh-sm mb-0">${{Cart::instance($id)->priceTotal()}}</p>
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
                            <p class="text-1100 fw-semi-bold">${{Cart::instance($id)->priceTotal()}}</p>
                          </div>
                          <div class="d-flex justify-content-between">
                            <p class="text-900 fw-semi-bold">Discount :</p>
                            @if(Cart::instance($id)->GetFixedDiscount())
                            <p class="text-danger fw-semi-bold">-${{Cart::instance($id)->GetFixedDiscount()}}</p>
                            @else
                            <p class="text-danger fw-semi-bold">-${{Cart::instance($id)->discount()}}</p>

                            @endif
                          </div>
                          @if(Cart::instance($id)->GetPercentDiscount())
                          <div class="d-flex justify-content-between">
                            <p class="text-900 fw-semi-bold">Pourcentage :</p>
                            <p class="text-success fw-semi-bold">{{Cart::instance($id)->GetPercentDiscount()}}%</p>
                          </div>
                          @endif
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
                        <div class="d-flex justify-content-between bItem-dashed-top pt-4">
                          <h4 class="mb-0">Total :</h4>
                          @if(Cart::instance($id)->GetFixedDiscount())

                          <h4 class="mb-0">${{Cart::instance($id)->total('2','.','') - Cart::instance($id)->GetFixedDiscount()+ 30}}.00</h4>
                          @else
                          <h4 class="mb-0">${{Cart::instance($id)->total('2','.','')  + 30}}.00</h4>

                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button> --}}
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{__('Add to cart')}}</h5>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      <form method="post" action={{route('addcheckproducts',$id)}}>
            @csrf
        <div class="modal-body">
          <table class="table fs--1 mb-0 bItem-top bItem-200">
            <thead>
              <tr>
                <th class="sort white-space-nowrap align-middle fs--2" scope="col"></th>

                <th class="white-space-nowrap fs--1 align-middle ps-0" style="width:26px;">
                    <div class="form-check mb-0 fs-0">
                    <input class="form-check-input" type="checkbox"></div>
                  </th>
                <th class="sort white-space-nowrap align-middle fs--2" scope="col"></th>
                <th class="sort white-space-nowrap align-middle" scope="col" style="min-width:150px;" data-sort="products">{{__('Product')}}</th>


                <th class="sort align-middle text-center" scope="col" data-sort="price" style="width:100px;">{{__('Price')}}</th>
                <th class="sort align-middle text-center" scope="col" data-sort="quantity" style="width:100px;">{{__('Quantity')}}</th>
               

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
              @foreach($products as $i =>$product) 
             
              <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                <td><input type="hidden" value="{{$product->id}}" name="id[]"/></td>
                <td class="fs--1 align-middle px-0 py-3">
                    <div class="form-check mb-0 fs-0">
                        <input type="hidden" name="check[{{$i}}]" value="0"  />

                    <input class="form-check-input" type="checkbox" name="check[{{$i}}]" value="1"  />
                </div>
                  </td>
                <td class="align-middle white-space-nowrap py-0">
                  <img class="rounded-circle" src="{{asset('images/'.$product->image)}}" alt="image" width="40" height="40" />
                </td>
                <td class="products align-middle">
                  <p class="text-1100 fw-bold lh-sm mb-0">{{$product->name}}</p>

                  <a class="fw-semi-bold mb-0" >{{$product->description}}</a>
                </td>
                <td class="price align-middle text-900 fw-semi-bold text-center">${{$product->price}}</td>
                <td class="quantity align-middle text-center d-flex justify-items-around">
                  
                  <input class="form-control text-center  bg-transparent bItem-1 px-0" name="qty[]" type="number" min="1" style="width:3rem" value="1" max="{{$product->qty}}" aria-label="Amount (to the nearest dollar)" />
                 
                </td>
                
                
              </tr>
             
              @endforeach
             
 
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >{{__('Cancel')}}</button>
          <button class="btn btn-primary" type="submit">{{__('Add to cart')}}</button>
        
        </div>
    </form>
      </div>
    </div>
  </div>
  <style>
    .modal-dialog{
    overflow-y: initial;
}

.modal-body{
    max-height: 50vh;
    overflow-y: auto;
}
</style>
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
   