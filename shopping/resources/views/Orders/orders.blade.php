<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders Management') }}
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
    <div class="row p-4">
        <table class="table">
            <thead class="thead-dark">
                <tr>

                    <th scope="col" width="15%">{{ __('Customer name') }}</th>
                    <th scope="col" width="15%">{{ __('Date of the order') }}</th>
                    <th scope="col" width="15%">{{ __('Content') }}</th>
                    <th scope="col" width="10%">{{__('Total Price')}}</th>
                    <th scope="col" width="10%">Tax</th>
                    <th scope="col" width="8%">{{__('Discount')}}</th>
                    <th scope="col" width="8%">{{__('Percentage')}}</th>
                    <th scope="col" width="10%">{{__('New Total')}}</th>
                    {{-- <th scope="col" width="4%">Delivered</th> --}}
                    <th scope="col" width="10%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>

                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            <ul class="list-disc">
                                @foreach ($order->orderItems as $Item)
                                    <li> {{ $Item->pivot->qty }} {{ $Item->name }}</li>
                                @endforeach
                            </ul>
                        </td>

                        <td>{{ $order->total }} $</td>
                        <td>{{ $order->tax }} $</td>
                        <td>{{ $order->discount }} $</td>
                        @if($order->total>10000)
                        <td>{{ $order->discount_percent }} %</td>
                        @else
                        <td style="color:rgb(232, 86, 37)"> {{__('fixed')}} </td>
                        @endif
                        <td>{{ $order->newTotal }} $</td>
                        
                        {{-- <td>
                            @if($order->delivered==1)
                          <img src="https://cdn-icons-png.flaticon.com/512/390/390973.png" width="20px">
                          @else
                          <img src="https://t3.ftcdn.net/jpg/03/45/66/72/240_F_345667205_RiD0t4Xf4oAKmr5nz4QygpCfHJhZQ13i.jpg" width="20px">
                          @endif
                        </td> --}}
                        <td>

                            <a type="submit" href="{{ route('order_products', $order->id) }}"
                                class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
                            @if (Auth::user()->role == 1)
                                <form method="post" style="display:inline"
                                    action="{{ route('order.delete', $order->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm remove-from-cart"><i
                                            class="fa fa-trash-o" fill="black"></i></button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>

</x-app-layout>
