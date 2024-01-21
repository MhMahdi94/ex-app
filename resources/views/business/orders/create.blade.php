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

                    {{-- <div class="card-body table-responsive p-0"> --}}
                      
                    <form method="POST" action="{{ route('business.orders.orders_store') }}" class='needs-validation'
                        novalidate>
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="card-body">
                                    @foreach ($categories as $category)
                                        <div class="accordion mb-2" id="accordionExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading{{ $category->id }}">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $category->id }}"
                                                        aria-expanded="false" aria-controls="collapse{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </button>
                                                </h2>
                                               
                                                <div id="collapse{{ $category->id }}" class="accordion-collapse collapse"
                                                    aria-labelledby="heading{{ $category->id }}" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body"> 
                                                      <table class="table table-bordered" id="dynamicAddRemove">
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Price</th>
                                                            <th>Quantity</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        <tr>
                                                          @foreach ($category->products as $product )
                                                          <div class="d-flex" id="product{{ $product->id }}">
                                                           <tr>
                                                            <td>{{ $product->name }}</td>
                                                            <td>{{ $product->sale_price }}</td>
                                                            <td>{{ $product->quantity }}</td>
                                                            <td> <a class="btn btn-sm btn-success px-1 add_product_btn" 
                                                              id="product-{{$product->id }}" 
                                                              data-name="{{ $product->name }}"
                                                              data-price="{{ $product->sale_price }}"
                                                              data-id="{{ $product->id }}"
                                                              href="#">Add</a></td>
                                                           </tr>
                                                          </div>
                                                        @endforeach
                                                        </tr>
                        
                                                    </table>
                                                      
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach



                                </div>
                            </div>
                          {{-- </div> --}}
                        <div class="col-md-6 card-body row g-3">
                            <div class="form-group  col-md-12">
                                <label for="client_id">Client</label>
                                <select name="client_id" id="" class="form-control select2">
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <table class="table table-bordered order-list" id="dynamicAddRemove">
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>

                            </table>
                            <div class="">
                              Total: <span class="total-orders"> {{ '0' }}</span>
                            </div>
                        </div>
                      </div></div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary disabled" id="add-order-btn">Submit</button>
                </div>
                </form>



                {{-- </div> --}}
            </div>
        </div>
    </div>
    </div>

    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <script>
        var i = 0;

        $("#add-btn").click(function() {

            ++i;

            $("#dynamicAddRemove").append('<tr><td><select name="details[' + i +
                '][product_id]" id="details_select[' + i + ']" class="form-control select2">' +
                ' @foreach ($products as $product)' +
                '   <option value="{{ $product->id }}">{{ $product->name }}</option>' +
                ' @endforeach' +
                '</select></td>' +
                '<td><input type="text" name="details[' + i +
                '][quantity]" placeholder="Quantity" class="form-control" /></td>' +
                '<td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>' +
                '</tr>');
        });

        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
    </script>
    <script>
      $(document).ready(
        function () {
          $('.add_product_btn').on('click', function(e){
            e.preventDefault();
            var id= $(this).data('id');
            var name= $(this).data('name');
            var price= $(this).data('price');
            
            //disable button after add
            $(this).removeClass('btn-success').addClass('btn-secondary disabled');

            var html=`<tr>
                        <input type="hidden" value="${id}" name="product_id[]"/>
                        <td>${name}</td>
                        <td><input type="number"  name="quantities[]" data-price=${price} class="form-control product-quantity" value="1" min="1" required/></td>
                        <td class="product-price">${price}</td>
                        <td><a class="btn btn-sm btn-danger px-1 remove-product-btn" 
                                id="remove_btn{{$product->id }}" 
                                data-id=${id} 
                                >Delete</a></td>
                      </tr>`;
            $('.order-list').append(html);
            calculateTotal();
          });

          $('body').on('click','.disabled', function(e){
            e.preventDefault();
          });

          $('body').on('click','.remove-product-btn', function(e){
            e.preventDefault();
            var id=$(this).data('id');
            //console.log(id);
            $(this).closest('tr').remove();
            $('#product-' + id).removeClass('btn-secondary disabled').addClass('btn-success');
            calculateTotal();
          });

          $('body').on('keyup change','.product-quantity', function(e){
            e.preventDefault();
            var quantity=parseInt($(this).val());
            var price=$(this).data('price');//parseFloat($(this).closest('tr').find('.product-price').html());
            $(this).closest('tr').find('.product-price').html(quantity*price);
            // var total_price=productPrice*quantity;
            // $('.total-orders').html(total_price);
            calculateTotal();
          });
        }
      );

      function calculateTotal(){
        var price=0;

        $('.order-list .product-price').each(function(index){
          price+= parseFloat($(this).html());
        });
        $('.total-orders').html(price);

        if(price>0){
          $('#add-order-btn').removeClass('disabled')
        }else{
          $('#add-order-btn').addClass('disabled')
        }
      }
    </script>
    <script>
        $("#details_select")
            .on("change", function() {
                console.log('first');
            });
        // .trigger( "change" );
    </script>
    <script>
        $('.btn-del-select').hide();
        $(document).on('click', '.add-select', function() {
            $(this).parent().parent().find(".clone-row").clone().insertBefore($(this).parent()).removeClass(
                "clone-row");
            $('.btn-del-select').fadeIn();
            $(this).parent().parent().find(".btn-del-select").click(function(e) {
                $(this).parent().parent().remove();
            });
        });
    </script>
@endsection
