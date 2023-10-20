<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your cart') }}
        </h2>

        <head>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
                integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
                crossorigin="anonymous">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
                crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
            </script>

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
            </script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
                integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
                crossorigin="anonymous">
        </head>
    </x-slot>
    <div style="padding: 20px;background-color:white">
        @if ($message = Session::get('message'))
            <div class="alert alert-success">
                <p>{{ __($message) }} {{-- $coupon->value --}}</p>
            </div>
        @endif
        @if ($error = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ __($error) }} {{-- $coupon->value --}}</p>
            </div>
        @endif
        @if (Cart::instance($id)->count())
            <form method="get" action="{{ route('cart.clear',$id) }}" style="margin-bottom: 1rem">
                @csrf

                <button class="btn btn-danger" type="submit">{{ __('Clear Cart') }}</button>
            </form>
        @endif
        <table style="background:rgb(242, 242, 242);padding:10rem;border-radius:4px" id="cart" class="table ">
            <thead>
                <tr>
                    <th style="width:40%">{{ __('Product') }}</th>
                    <th style="width:20%" class="text-center">{{ __('Description') }}</th>
                    {{-- <th style="width:8%">Quantity</th> --}}
                    <th style="width:15%">{{ __('Quantity') }}</th>
                    <th style="width:8%">{{ __('Price') }}</th>

                    <th style="width:10%">{{ __('Subtotal') }}</th>
                    <th style="width:8%">{{ __('Remove') }} </th>
                </tr>
            </thead>
            <tbody>
                {{-- @php $total = 0 @endphp
                     @if (session('cart')) --}}
                @foreach ($cartItems as $cartItem)
                    {{-- @php $total += $cartItem->price * $cartItem->quantity @endphp --}}
                    <tr data-id="{{ $cartItem->id }}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs">
                                    <img src="{{ asset('images/' . $cartItem->model->image) }}" width="100"
                                        height="100" class="img-responsive" />
                                </div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $cartItem->name }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="description" class="text-center">{{ $cartItem->model->description }}</td>
                        <td data-th="Quantity">
                            <form method="post" action="{{ url('/updatecart/'. $id.'/'.$cartItem->rowId) }}">
                                @method('put')
                                @csrf
                                <span>

                                    <input type="number" name="qty" value="{{ $cartItem->qty }}"
                                        style="width:3.5rem;display:inline" min=1 max={{ $cartItem->model->qty }}
                                        class="form-control quantity update-cart" />
                                    <button type="submit" clas="btn btn-secondary  "><svg
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg></button></span>
                            </form>

                        </td>
                        <td data-th="Price">{{ $cartItem->price }}$</td>
                        <td data-th="subtotal" class="text-center">{{ $cartItem->qty * $cartItem->model->price }}</td>


                        <td class="actions" data-th="">
                            <form action="{{ url('/cartlist/'.$id.'/' .$cartItem->rowId) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm remove-from-cart"><i
                                        class="fa fa-trash-o"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                {{-- @endif --}}
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" class="text-right">

                        <h5><strong>{{__('Total Price')}} ${{ Cart::instance($id)->priceTotal() }}</strong></h5>

                        <div>
                            <h5><b>Tax : {{ Cart::instance($id)->tax() }} $</b></h5>

                        </div>
                        <div>
                            <h5><b>Total : {{ Cart::instance($id)->total() }} $</b></h5>

                        </div>
                        {{-- @if (session()->get('used'))
                            @if (Cart::instance($id)->priceTotal('2', '.', '') > 10000)
                                @if (Cart::instance($id)->GetPercentDiscount()) 
                                    <hr>
                                    <div style="color:green">

                                        <h5><b>{{__('New Total')}} : {{ Cart::instance($id)->total() }} $</b></h5>
                                        <div> {{__('Discount')}} : {{ Cart::instance($id)->discount() }}</div>
                                        <div> {{__('Percentage')}} : {{ Cart::instance($id)->GetPercentDiscount() }}%
                                        </div>

                                    </div>
                                @endif 
                            @else
                                @if (Cart::instance($id)->GetFixedDiscount())
                                    <hr>
                                    <div style="color:green">
                                        <h5><b>{{__('New Total')}} : {{ Cart::instance($id)->GetTotalFixed() }}
                                                $</b></h5>
                                    {{__('Discount')}} :   {{ Cart::instance($id)->GetFixedDiscount() }}$
                                    </div>
                                @endif
                            @endif
                        @else
                            @if (Cart::instance($id)->count())
                                <h5><strong>Total ${{ Cart::instance($id)->total() }}</strong></h5>

                                <hr>
                                @if (Cart::instance($id)->total('2', '.', '') < 10000)
                                    <div style="color:#47d147"> <b>{{__('Your total is less than 10000 ,supply the correspondent code to have a discount.')}}</b></div>
                                @else
                                    <div style="color:#47d147"> <b>{{__('Your total is greater than 10000 ,supply the correspondent code to have a discount.')}}</b></div>
                                    <br>
                                @endif
                                <form method="post" action="{{ route('coupon.use') }}"
                                    style="display:flex;align-items:right;justify-content:right">

                                    @csrf
                                    <div style="margin-right: 1rem">{{__('Do you have a code ?')}}</div>
                                    <input class="form-control border-right-0" type="text" name="code"
                                        placeholder="{{ __('Coupon code') }}" style="display:inline;width:20em"
                                        required>
                                    <button type="submit" class="btn btn-secondary"
                                        style="display:inline">{{__('Apply')}}</button>
                                </form>

                            @endif
                        @endif --}}

                    </td>

                </tr>


                <tr>
                    <td colspan="6" class="text-right">
                        <a href="{{ route('dashboard') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>
                            {{ __('Continue Shopping') }}</a>
                        @if (Cart::instance($id)->count() > 0)
                            <form action="{{ route('order.create') }} " style="display:inline" method="post">
                                @csrf
                                <button class="btn btn-success" type="submit">{{ __('Order now') }}</button>
                            </form>
                        @endif
                    </td>
                </tr>


            </tfoot>
        </table>



    </div>
    <!-- Button trigger modal -->


    <!-- Modal -->

    <!-- Modal -->
    <div class="modal fade" style=".modal-backdrop {
        opacity: 0.5 !important;
      }" id="exampleModal"
        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-size: 20px;font-weight:20px;">
                        {{ __('Please enter your email and address.') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('commande') }}">

                        @foreach (Cart::instance($id)->content() as $cartItem)
                            <div>
                                <div class="input-group-append bg-transparent mb-2">
                                    {{ $cartItem->qty }} {{ $cartItem->name }}
                                    <br>
                                    <div style="text-align:end">
                                        <span> {{ $cartItem->total }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <hr>
                       {{__('Do you have a code ?')}}
                        <div class="input-group mt-4">


                            <input class="form-control border-left-0" type="text" name="code"
                                placeholder="{{ __('Coupon code') }}" style="height:3em" required>

                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-danger">{{ __('Cancel') }} </button>
                            <button type="submit" class="btn btn-success">{{ __('Confirm') }}</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
    </div>
</x-app-layout>





{{-- @section('scripts')
<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{-- route('update.cart') --}}
{{-- method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                //url: '{{-- route('remove.from.cart') --}}
{{-- method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
</script>
@endsection --}}
