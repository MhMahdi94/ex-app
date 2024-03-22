@extends('layout.company')
@section('title')
    Stock
@endsection
@section('page_name')
    Stock Page
@endsection
@section('active_link')
    <a href="#">Stock</a>
@endsection
@section('active_content')
    Stock Page
@endsection
@section('content')
    <!-- /.row -->
    <div class="page-content">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 text-uppercase ">{{ __('routes.Product List') }}</h6>

                         
                        <div class="d-flex ustify-content-between align-items-center" width='200'>
                            @if (Auth::guard('employee')->user()->can('add-product'))
                                <a class=" btn btn-success float-right"
                                    href="{{ route('company.stock.stock_create') }}">{{ __('routes.Add Product') }}</a>
                            @endif
                            @if (Auth::guard('employee')->user()->can('stock-report'))
                                <a class=" btn btn-dark float-right mx-2"
                                    href="{{ route('company.stock.report_pdf') }}" target="_Blank">{{ __('routes.Report') }}</a>
                            @endif
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive ">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('routes.Name') }}</th>
                                    <th>{{ __('routes.Quantity') }}</th>
                                    <th>{{ __('routes.Price') }}</th>
                                    <th>{{ __('routes.Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td class="d-flex  ">
                                            
                                            <a class="btn btn-warning px-4"
                                                href="{{ route('company.stock.stock_import_export', $item->id) }}">{{ __('routes.Import/Export') }}</a>


                                        </td>
                                    </tr>

                    </div>

                </div>
            </div>
            @endforeach
            </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    </div>
    </div>


    <script>
        $(document).ready(function() {

            $('.delete-form').on('submit', function(e) {
                e.preventDefault();
                console.log($(this).data('route'));
                Swal.fire({
                    title: "{{ __('routes.Are you sure?') }}",
                    // text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText:"{{ __('routes.Cancel') }}",
                    confirmButtonText: "{{ __('routes.Yes, delete it!') }}"
                }).then((result) => {

                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'delete',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: $(this).data('route'),
                            data: {
                                '_method': 'delete'
                            },
                            success: function(response, textStatus, xhr) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your department has been deleted.",
                                    icon: "success"
                                });
                                setTimeout(function() {
                                    //your code to be executed after 1 second
                                    location.reload;
                                }, 3000);

                            }
                        });

                    }
                });

            })
        });
        $('#delete_admin').click(function() {
            console.log('click')
            var userURL = $(this).data('route');
            console.log(userURL)
            var token = $("meta[name='csrf-token']").attr("content");
            console.log(token)


            // $.ajax(

            // {

            //     url: "users/"+id,

            //     type: 'DELETE',

            //     data: {

            //         "id": id,

            //         "_token": token,

            //     },

            //     success: function (){

            //         console.log("it Works");

            //     }

            // });
        })
    </script>
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
@endsection
