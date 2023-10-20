<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div>
        <x-jet-application-logo class="block h-12 w-auto" />
    </div>

    <div class="mt-8 text-2xl">
        Welcome to your Jetstream application!
    </div>

    <div class="mt-6 text-gray-500">
        Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed
        to help you build your application using a development environment that is simple, powerful, and enjoyable. We believe
        you should love expressing your creativity through programming, so we have spent time carefully crafting the Laravel
        ecosystem to be a breath of fresh air. We hope you love it.
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    


   


    @extends('layout')


    @section('content')

    <div class="row ">
        @foreach($products as $product)
            <div class="col-xs-18 col-sm-6 col-lg-3 col-md-4">
                <div class="thumbnail">
                    <img src="{{ $product->image }}" alt="">
                    <div class="caption">
                        <h4>{{ $product->name }}</h4>
                        <p>{{ $product->description }}</p>
                        <p><strong>Price: </strong> {{ $product->price }}$</p>
                            <a class="btn btn-warning"  role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                </svg>
                            </a>
                            <a href="{{-- route('add.to.cart', $product->id) --}}" class="btn btn-success  text-center" role="button">
                                <span style="padding-right:1em ; color:black">Add to cart</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                            </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endsection




</div>
