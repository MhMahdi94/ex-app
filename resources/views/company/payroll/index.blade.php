@extends('layout.company')
@section('title')
    Admins
@endsection
@section('page_name')
    Roles Page
@endsection
@section('active_link')
    <a href="#">Admins</a>
@endsection
@section('active_content')
    Roles Page
@endsection
@section('content')
    <!-- /.row -->
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h6 class="mb-0 text-uppercase ">Payroll</h6>
                        {{-- <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal"
                            data-bs-target="#SearchModal">
                            <input class="form-control px-5" disabled type="search" placeholder="Search">
                            <span
                                class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i
                                    class='bx bx-search'></i></span>
                        </div>





                        <div class="d-flex ustify-content-between align-items-center" width='200'>
                            <a class=" btn btn-primary float-right" href="{{ route('company.roles.roles_create') }}">Add
                                Role</a>
                        </div> --}}

                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('company.payroll.payroll_list') }}" class='needs-validation'
                            novalidate>
                            @csrf
                            <div class="card-body row g-2">
                                

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="from">From</label>
                                        <input type="date" name="from" class="form-control" id="from" value="{{ $from??'' }}"
                                            placeholder="From" />
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="to">To</label>
                                        <input type="date" name="to" class="form-control" id="to" value="{{ $to??'' }}"
                                            placeholder="From" />
                                    </div>
                                </div>
                                <div class="col-4">
                                    {{-- <div class="form-group"> --}}
                                   

                                    {{-- </div> --}}
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-secondary">Search</button>
                                </div>
                        </form>
                    </div>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-uppercase ">Payroll Sheet( {{ $from }} -> {{ $to }})</h6>
                            
                            <form method="POST" action="{{ route('company.payroll.payroll_pdf') }}">
                                @csrf
                                <input type="hidden" name="employee_id" value="{{ $employee->id ?? '' }}"/>
                                <input type="hidden" name="from" value="{{ $from ?? '' }}"/>
                                <input type="hidden" name="to" value="{{ $to ?? '' }}"/>
                                <button type="submit" class=" btn btn-dark float-right" >Print</button>
                            </form>
                            {{-- <a class=" btn btn-primary float-right" href="{{ route('company.payroll.payroll_pdf') }}">Print</a> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Total Days</th>
                                            <th>Working</th>
                                            <th>Absent</th>
                                            <th>Salary</th>
                                            <th>Current Salary</th>
                                            {{-- <th>Actions</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
    
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ $employee->name }}</td>
                                                <td>{{ $diff }}</td>
                                                <td>{{ $employee->check_in }}</td>
                                                <td>{{ $diff-$employee->check_in }}</td>
                                                <td>{{$employee->details->salary }}</td>
                                                <td>{{$employee->current_salary }}</td>
                                                {{-- <td class="d-flex ">
                                                    <div class="mx-2">
                                                        <a class="btn btn-primary px-4"
                                                            href="{{ route('company.roles.roles_edit', $employee->id) }}">Edit</a>
                                                    </div>
                                                    <div class="">
                                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                                        <form method="post" class="delete-form"
                                                            data-route="{{ route('company.roles.roles_destroy', $employee->id) }}">
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger px-4 ">Delete</button>
                                                        </form>
                                                    </div>
    
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
    
                                </table>
                            </div>
                        </div>
                    </div>
                        
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        $('#update_request').click(function() {
            console.log('click')
            var userURL = $(this).data('url');
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                                    text: "Your admin has been deleted.",
                                    icon: "success"
                                });
                                setTimeout(function() {
                                    //your code to be executed after 1 second
                                    location.reload();
                                }, 3000);

                            }
                        });

                    }
                });

            })
        });
    </script>
@endsection
