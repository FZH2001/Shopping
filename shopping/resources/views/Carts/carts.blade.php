<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('See Carts') }}
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

                    <th scope="col" width="20%">{{ __('Customer name') }}</th>
                    <th scope="col" width="20%">{{ __('Content') }}</th>
                    <th scope="col" width="10%">Total Initial</th>
                    <th scope="col" width="2%">Tax</th>
                    <th scope="col" width="8%">{{ __('Discount') }}</th>
                    <th scope="col" width="10%">Total</th>
                    <th scope="col" width="10%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @if (Cart::instance($user->id)->count())
                        <tr>

                            <td>{{ $user->name }}</td>
                            <td>
                                <ul>
                                    @foreach (Cart::instance($user->id)->content() as $Item)
                                        <li> {{ $Item->qty }} {{ $Item->name }}</li>
                                    @endforeach
                                </ul>
                            </td>

                            <td>{{ Cart::instance($user->id)->priceTotal() }} $</td>

                            <td>{{ Cart::instance($user->id)->tax() }}</td>
                            @if (Cart::instance($user->id)->priceTotal('2', '.', '') >= 10000)
                                <td> {{ Cart::instance($user->id)->discount() }} </td>
                                <td>{{ Cart::instance($user->id)->total }} $</td>
                            @else
                                <td> {{ Cart::instance($user->id)->GetFixedDiscount() }} $</td>
                                <td>{{ (float) Cart::instance($user->id)->total('2', '.', '') - (float) Cart::instance($user->id)->GetFixedDiscount() }}
                                    $</td>
                            @endif
                            <td>
                                <form method="post" action="{{ route('showcart', $user->id) }}" style="display:inline">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm" style="display:inline"><i
                                            class="fa fa-eye"></i></button>
                                </form>

                                <form action="{{ route('removecart',$user->id) }}" method="post" style="display:inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm remove-from-cart"><i
                                            class="fa fa-trash-o"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>


    </div>

</x-app-layout>
