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

    <div class="py-12 justify-content-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                {{-- bg-white overflow-hidden p-10 shadow-xl sm:rounded-lg --}}
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-center" style="text-align:center">
                            <h2> {{__('Show Product')}}</h2>
                        </div>

                        <br>
                    </div>
                </div>
                <br>
                <div  class="row">

           
                
                        <div class="form-group p-2">
                            <span>
                             <strong>{{__('Name')}}:</strong>
                             {{ $product->name }}
                            </span>
                            <br>
                            <br>
                         <span>
                             <strong>Description:</strong>
                             {{ $product->description }}
                         </span>
                         <br>
                         <br>
                            <strong>Image:</strong>
                            <img src="/images/{{ $product->image }}" style="float: right;margin-right:20em" width="300px">
                            
                        </div>
                        <div style="display:inline;" class="col-xs-12 col-sm-12 col-md-12">
                            
                     </div>
                    </div>
           
                </div>
        

            </div>
        </div>
    </div>
</x-app-layout>


<div class="col-sm-6">
    <a href="#exampleModal" class="delete" data-toggle="modal"></a>
</div>
  
  <!-- Modal -->
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         Woohoo, you're reading this text in a modal!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</div>
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