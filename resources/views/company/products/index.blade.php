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
                        <h6 class="mb-0 text-uppercase ">Product List</h6>

                        <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal"
                            data-bs-target="#SearchModal">
                            <input class="form-control px-5" disabled type="search" placeholder="Search">
                            <span
                                class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i
                                    class='bx bx-search'></i></span>
                        </div>
                        <div class="d-flex ustify-content-between align-items-center" width='200'>
                            <a class=" btn btn-success float-right" href="{{ route('company.stock.stock_create') }}">Add
                                Product</a>
                            <a class=" btn btn-dark float-right mx-2" href="{{ route('company.stock.report_pdf') }}">Report</a>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive ">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td class="d-flex  ">
                                            <a class="btn btn-warning px-4"
                                                href="{{ route('company.stock.stock_import_export', $item->id) }}">Import/Export</a>
                                   
                                            {{-- <a class="btn btn-info" data-toggle="modal"
                                                data-bs-target="#modal-lg{{ $item->id }}">Import/Export</a>
                                            <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-lg{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Import/Export</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST"
                                                        action="{{ route('company.stock.stock_update', $item->id) }}"
                                                        class='needs-validation' novalidate>
                                                        @csrf
                                                        @method('put')
                                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                        <div class="card-body row">
                                                            <div class="form-group col-12">
                                                                <label for="name">Name</label>
                                                                <input type="text" readonly name="name"
                                                                    value="{{ $item->name }}" class="form-control"
                                                                    id="name" placeholder="Enter Name" required>
                                                            </div>
                                                            <div class="form-group col-12">
                                                                <label for="operation_id">Operation</label>
                                                                <select name="operation_id" id=""
                                                                    class="form-control select2">

                                                                    <option value="0">Import</option>
                                                                    <option value="1">Export</option>

                                                                </select>
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <label for="current_quantity">Current Quantity</label>
                                                                <input type="text" readonly name="current_quantity"
                                                                    value="{{ $item->quantity }}" class="form-control"
                                                                    id="current_quantity" placeholder="Enter Name" required>
                                                            </div>

                                                            <div class="form-group col-6">
                                                                <label for="quantity">Total Import/Export</label>
                                                                <input type="number" name="quantity" class="form-control"
                                                                    id="quantity" placeholder="Total Import/Export"
                                                                    required>
                                                            </div>
                                                            <div class="form-group col-12">
                                                                <label for="quantity">Notes</label>
                                                                <textarea class="form-control" rows="3" placeholder="Enter ..." name="notes"></textarea>
                                                            </div>

                                                        </div>
                                                        <!-- /.card-body -->

                                                        <div class="modal-footer justify-content-between">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                {{-- <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div> --}}
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
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
                    title: "Are you sure?",
                    // text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
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
