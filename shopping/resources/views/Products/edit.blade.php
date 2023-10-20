<x-app-layout>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>


    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div >

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="text-center" >
                            <h2>{{ __('Edit Product') }}</h2>
                        </div>

                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> {{ __('There were some problems with your input.') }}<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ __($error) }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('update', $product) }}" style="padding:1em;" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group ">
                                <strong>{{ __('Name') }}:</strong>
                                <input type="text" name="name" style="width:50%" value="{{ $product->name }}"
                                    class="form-control" placeholder="Name">
                            </div>
        
                            <div class="form-group">
                                <strong>Description:</strong>
                                <textarea class="form-control" style="height:150px;width:50%" style="width:50%" name="description"
                                    placeholder="Description">{{ $product->description }}</textarea>
                            </div>
                            <div class="form-group ">
                                <strong>Price:</strong>
                                <input class="form-control" type="number" value="{{$product->price}}" style="width:50%" name="price"
                                    placeholder="price">
                            </div>
                            <div class="form-group ">
                                <strong>Quantity:</strong>
                                <input class="form-control" type="number" value=@if ($product->qty){{$product->qty}}@else 0 @endif style="width:50%" name="qty"
                                    placeholder="price">
                            </div>
                            <div class="form-group">
                                <strong>Image:</strong>
                                <input type="file" name="image" style="width:50%" class="form-control"
                                    placeholder="image">
                                <img src="/images/{{ $product->image }}" width="300px">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary" style="text-align:center">{{ __('Submit') }}</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
