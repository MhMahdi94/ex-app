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
        {{-- <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-primary" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                       
                                        <div class="tab-title">Products</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        
                                        <div class="tab-title">Services</div>
                                    </div>
                                </a>
                            </li>
                            
                        </ul>
                        <div class="tab-content py-3">
                            <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                                @include('business.orders.inc.products')
                            </div>
                            <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                                @include('business.orders.inc.services')
                            </div>
                           
                        </div>
                    </div>
                </div>
               
    </div>
    </div> --}}
        @include('business.orders.inc.products')
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
            function() {
                $('.add_product_btn').on('click', function(e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    var name = $(this).data('name');
                    var price = $(this).data('price');

                    //disable button after add
                    $(this).removeClass('btn-success').addClass('btn-secondary disabled');

                    var html = `<tr>
                        <input type="hidden" value="${id}" name="product_id[]"/>
                        <td>${name}</td>
                        <td><input type="number"  name="quantities[]" data-price=${price} class="form-control product-quantity" value="1" min="1" required/></td>
                        <td class="product-price">${price}</td>
                        <td><a class="btn btn-sm btn-danger px-1 remove-product-btn" 
                                id="remove_btn{{ $product->id }}" 
                                data-id=${id} 
                                >{{ __('routes.Delete') }}</a></td>
                      </tr>`;
                    $('.order-list').append(html);
                    calculateTotal();
                });

                $('body').on('click', '.disabled', function(e) {
                    e.preventDefault();
                });

                $('body').on('click', '.remove-product-btn', function(e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    //console.log(id);
                    $(this).closest('tr').remove();
                    $('#product-' + id).removeClass('btn-secondary disabled').addClass('btn-success');
                    calculateTotal();
                });

                $('body').on('keyup change', '.product-quantity', function(e) {
                    e.preventDefault();
                    var quantity = parseInt($(this).val());
                    var price = $(this).data(
                    'price'); //parseFloat($(this).closest('tr').find('.product-price').html());
                    $(this).closest('tr').find('.product-price').html(quantity * price);
                    // var total_price=productPrice*quantity;
                    // $('.total-orders').html(total_price);
                    calculateTotal();
                });
            }
        );

        function calculateTotal() {
            var price = 0;

            $('.order-list .product-price').each(function(index) {
                price += parseFloat($(this).html());
            });
            $('.total-orders').html(price);
            $('.total_order').val(price);
            if (price > 0) {
                $('#add-order-btn').removeClass('disabled')
            } else {
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
