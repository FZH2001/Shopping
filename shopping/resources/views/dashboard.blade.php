<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products list') }}
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
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto auto;
            background-color: #f5fbff;
            justify-content: space-between;
            align-content: space-between;
            padding: 10px 50px;
        }

        .grid-item {
            background-color: rgba(253, 253, 253, 0.924);
            border: 1px solid rgb(0, 68, 196);
            /* padding: 10px; */
            font-size: 30px;
            margin: 10px;
            /* height:20rem; */
            /* text-align: center; */
           

            vertical-align: middle;
            border-radius: 1px;
        }

        .productname {
            font-weight: bold;
        }
    </style>
    <div class="row p-4">
        @foreach ($products as $product)
            <div class="col-xs-18 col-sm-6 col-lg-3 col-md-4">
                <div class="thumbnail m-2">
                    <img style="height:150px;width:150px" src="{{ asset('images/' . $product->image) }}"
                        alt="{{ $product->name }}">
                    <div class="caption mb-4">
                        <h4><b>{{ $product->name }}</b></h4>
                        <p>{{ $product->description }}</p>
                        <p><strong>{{ __('Price') }}: </strong> {{ $product->price }}$</p>
                        <p><strong>{{ __('Quantity') }}: </strong>
                            @if ($product->qty > 0)
                                <span style="color:rgb(0, 172, 0)">{{ __('Available') }}</span>
                            @else
                                <span style="color:red">{{ __('Sold out') }}</span>
                            @endif
                        </p>

                        @if (Cart::instance(Auth::user()->id)->content()->where('id', $product->id)->count())
                            <div style="display:inline;">
                                <a class="btn btn-warning" href={{ route('show', $product->id) }} role="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path
                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                    </svg>
                                </a>
                            </div>
                            <a href="" class="btn btn-info text-center" role="button">
                                <span
                                    style="padding-right: 3px ;font-size:13px;  color:white;">{{ __('In cart') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" style="display:inline;" width="20"
                                    height="20" fill="brown" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </a>
                        @else
                            @if ($product->qty > 0)
                                <form class="form-group" action="{{ route('add.to.cart', $product->id) }}"
                                    style="display:inline;" method="POST">
                                    @csrf

                                    <div class="input-group mb-1 ">
                                        <span class="input-group-addon"
                                            style="margin-right: 1rem">{{ __('Items number') }}</span>
                                        <input type="number" value="1" class="form-control " name="qty"
                                            style="width:3.5rem;" min=1 max={{ $product->qty }}>
                                    </div>
                                    <div style="display:inline;">
                                        <a class="btn btn-warning" href={{ route('show', $product->id) }}
                                            role="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                <path
                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                            </svg>
                                        </a>
                                    </div>

                                    <button href="{{ route('add.to.cart', $product->id) }}" style="display:inline"
                                        type="submit" class="btn btn-success text-center" role="button">
                                        <span
                                            style="padding-right: 3px ;font-size:13px; color:white">{{ __('Add to cart') }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" style="display:inline;" width="20"
                                            height="20" fill="brown" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                        </svg>
                                    </button>
                                </form>
                            @else
                                <div style="display:inline;">
                                    <a class="btn btn-warning" href={{ route('show', $product->id) }} role="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                            <path
                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                        </svg>
                                    </a>
                                </div>

                                <button href="" style="display:inline" class="btn btn-secondary text-center"
                                    role="button">
                                    <span style="padding-right: 3px ;font-size:13px; ">{{ __('Soon in stock') }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" style="display:inline;" width="20"
                                        height="20" fill="brown" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg>
                                </button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="grid-container">
        @foreach ($products as $product)
            <div class="grid-item">
                <img class="productimage" src="{{ asset('images/' . $product->image) }}"
                    style="height:250px;width:250px;object-fit:cover; ">
                <div class="productname"><b>
                        <h4>{{ $product->name }}</h4>
                    </b></div>
                <div style="font-weight: 8 px">{{ $product->description }}</div>
            </div>
        @endforeach
    </div>

    <div style="padding:1rem;">
        <div style="background:rgb(236, 209, 155);display:inline-block;width:50%;height:100px;float: left;">i have
            something</div>
        <div style="display:inline-block;width:100%;object-fit:cover"><img
                src="https://static.wixstatic.com/media/c837a6_ecf32c7284d4430582fcc90f60a1b4e6~mv2.png/v1/fill/w_2134,h_1200,al_c,q_95,usm_0.66_1.00_0.01,enc_auto/c837a6_ecf32c7284d4430582fcc90f60a1b4e6~mv2.png">
        </div>
    </div>

</x-app-layout>
