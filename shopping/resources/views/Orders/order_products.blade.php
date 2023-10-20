<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Order') }}
        </h2>
    </x-slot>

    <head>
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> --}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <div class="p-4">
        @if ($message = Session::get('message'))
            <div class="alert alert-success">
                <p>{{ __($message) }} {{-- $coupon->value --}}</p>
            </div>
        @endif
        {{-- @if(Cart::instance($orders->user_id)->count())
        <form method="post" action="{{route('AddCartItems',$orders->id)}}" style="margin-bottom:2 rem">
            @csrf
        <button class="btn btn-success" type="submit" style="margin-right:1rem"> + {{__("Add custumer 's cart products to this order")}}</button>
        </form>
        @endif --}}
        <table class="table" style="margin-top:1rem">
            <thead class="thead-dark">
                <tr>

                    <th scope="col" width="40%">{{ __('Product') }}</th>
                    <th scope="col">{{ __('Quantity') }}</th>
                    <th scope="col">{{ __('Price') }}</th>
                    <th scope="col">Total</th>
                    @if (Auth::user()->role == 1)
                        <th scope="col">Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($orders->orderItems as $Item)
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs">
                                <img src="{{ asset('images/' . $Item->image) }}" width="150" height="150"
                                    class="img-responsive" />
                            </div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $Item->name }}</h4>
                            </div>
                        </div>
                    </td>
                    <td>
                        @if (Auth::user()->role == 1)
                            <form method="post" action="{{ url('orderitemupdate/' . $orders->id . '/' . $Item->id) }}">
                                @method('put')
                                @csrf
                                <input type="number" class="form-control" name="qty"
                                    value="{{ $Item->pivot->qty }}" style="width:3.5rem;display:inline;margin-right:4px"
                                    min=1 max="{{ $Item->qty + $Item->pivot->qty }}">
                                {{-- <input type="number" name="qty" value="{{$Item->pivot->qty}}"> --}}
                                <button type="submit" clas="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="20" height="20" fill="currentColor" class="bi bi-pencil-square"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg></button>
                            </form>
                        @else
                            {{ $Item->pivot->qty }}
                        @endif
                    </td>
                    <td>{{ $Item->price }} $</td>
                    <td>{{ $Item->pivot->total }} $</td>
                    @if (Auth::user()->role == 1)
                        <td>
                            <form method="post"
                                action="{{ url('orderitemdelete/ ' . $orders->id . '/' . $Item->id) }}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"
                                        fill="black"></i></button>
                            </form>
                        </td>
                    @endif
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" class="text-right mr-4">
                        <h4><strong>Total {{ $orders->total }}$</strong></h4>
                    </td>
                </tr>

            </tfoot>
        </table>


    </div>

</x-app-layout>
