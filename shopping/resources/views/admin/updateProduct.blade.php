@extends('layouts.links')
@section('content')
    <div class="content">
        <form method="post" action="{{ route('update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row g-3 flex-between-center mb-5">
                <div class="col-auto">
                    <h2 class="mb-2">{{__('Edit product')}}</h2>
                </div>
                <div class="col-auto">

                    <button class="btn btn-primary mb-2 mb-sm-0" type="submit">{{__('Edit product')}}</button>

                </div>

            </div>
            <h4 class="mb-3">{{__('Product name')}}</h4>
            <div class="row g-5">
                <div class="col-12 col-xl-8">
                    <input class="form-control mb-5" type="text" name="name" placeholder="Write title here..."
                        value="{{ $product->name }}" required />
                    <div class="mb-6">
                        <h4 class="mb-3"> {{__('Product description')}}</h4>
                        <textarea class="form-control mb-5" name="description" placeholder="Product description" style="height:6rem" required>{{ $product->description }}</textarea>
                    </div>
                    <h4 class="mb-3">{{__('Product category')}}</h4>
                    <input class="form-control mb-5" type="text" name="category" placeholder="Product category"
                        value="{{ $product->category }}" required />
                    <h4 class="mb-3">{{__('Product price')}}</h4>
                    <input class="form-control mb-5" type="number" name="price" placeholder="{{__('Product price')}}"
                        value="{{ $product->price }}" required />
                    <h4 class="mb-3">{{__('Product quantity')}}</h4>
                    <input class="form-control mb-5" type="number" name="qty" placeholder="{{__('Product quantity')}}"
                        value="{{ $product->qty }}" required />

                    <h4 class="mb-3">Display images</h4>
                    <div class="dropzone dropzone-multiple p-0 mb-5" id="my-awesome-dropzone" data-dropzone="data-dropzone">
                        <div class="fallback">
                            <input class="form-control" name="image" type="file"  />
                        </div>
                        <img src="/images/{{ $product->image }}" width="100px">

                    </div>
                </div>

            </div>
        </form>
    </div>
    <footer class="footer position-absolute">
        <div class="row g-0 justify-content-between align-items-center h-100 mb-3">
            <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 mt-2 mt-sm-0 text-900">Thank you for creating with Phoenix<span
                        class="d-none d-sm-inline-block"></span><span class="mx-1">|</span><br class="d-sm-none" />2022
                    &copy; <a href="https://themewagon.com">Themewagon</a></p>
            </div>
            <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600">v1.2.0</p>
            </div>
        </div>
    </footer>
    </div>
@endsection
