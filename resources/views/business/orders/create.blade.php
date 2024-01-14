@extends('layout.business')
{{-- @section('title')
Owners
@endsection
@section('page_name')
Owners Page
@endsection
@section('active_link')
<a href="#">Owners</a>
@endsection
@section('active_content')
Owners Page
@endsection --}}
@section('content')
 <!-- /.row -->
<div class="page-content">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Create Order</h3>

              
            </div>
            {{-- {{ $products }} --}}
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <form method="POST" action="{{ route('business.orders.orders_store') }}" class='needs-validation' novalidate>
                    @csrf
                    <div class="card-body row g-3">
                        <div class="form-group  col-md-6">
                          <label for="client_id">Client</label>
                          <select name="client_id" id="" class="form-control select2">
                            @foreach ($clients as $client)
                              <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <table class="table table-bordered" id="dynamicAddRemove">  
                          <tr>
                              <th>Product</th>
                              <th>Quantity</th>
                              <th>Action</th>
                          </tr>
                          <tr>  
                              <td>
                                {{-- <input type="text" name="allowenceFields[0][all_name]" placeholder="Product" class="form-control" /> --}}
                                <select name="details[0][product_id]" id="" class="form-control select2">
                                  @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                  @endforeach
                                </select>
                              </td>  
                              <td><input type="text" name="details[0][quantity]" placeholder="Quantity" class="form-control" /></td>  
                              <td><button type="button" name="add" id="add-btn" class="btn btn-success">Add More</button></td>  
                          </tr>  
                      </table> 
                       
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
</div>

<script>
    (function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>

  <script>
    var i = 0;
         
         $("#add-btn").click(function(){
        
             ++i;
        
             $("#dynamicAddRemove").append('<tr><td><select name="details['+i+'][product_id]" id="" class="form-control select2">'+
                                 ' @foreach ($products as $product)'+
                                 '   <option value="{{ $product->id }}">{{ $product->name }}</option>'+
                                 ' @endforeach'+
                                '</select></td>'+
                                '<td><input type="text" name="details['+i+'][quantity]" placeholder="Quantity" class="form-control" /></td></tr>');
         });
        
         $(document).on('click', '.remove-tr', function(){  
              $(this).parents('tr').remove();
         });  
  </script>
<script>
  $('.btn-del-select').hide();
  $(document).on('click','.add-select', function(){
      $(this).parent().parent().find(".clone-row").clone().insertBefore($(this).parent()).removeClass("clone-row");
      $('.btn-del-select').fadeIn();
      $(this).parent().parent().find(".btn-del-select").click(function(e) {
          $(this).parent().parent().remove(); 
      });
  });
</script>
 @endsection