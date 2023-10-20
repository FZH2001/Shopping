<x-app-layout>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <div class="py-8 justify-content-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" ">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div style="text-align:center;margin-top:1em" class="pull-center">
                            <h3>{{ __('Add New Product') }}</h3>
                        </div>
               
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>{{ __('Whoops!') }}</strong>
                        {{ __('There were some problems with your input.') }}<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form style="padding:1em;margin-left:20rem;margin-rightt:20rem;" action="{{ route('store') }}"  method="POST" class="d-flex justify-content-center" enctype="multipart/form-data">
                    @csrf

                    <div class="row" >
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group ">
                                <strong>{{ __('Name') }}:</strong>
                                <input type="text" name="name" style="width:50%" class="form-control" placeholder="{{ __('Name') }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group ">
                                <strong>Description:</strong>
                                <textarea class="form-control" style="height:100px;width:50%" name="description" placeholder="description"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group ">
                                <strong>Quantity:</strong>
                                <input class="form-control" type="number" style="width:50%" name="qty" placeholder="Quantity">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group ">
                                <strong>Price:</strong>
                                <input class="form-control" type="number" style="width:50%" name="price"
                                    placeholder="price">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group ">
                                <strong>Image:</strong>
                                <input type="file" name="image" class="form-control" style="width:50%"
                                    placeholder="image">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
