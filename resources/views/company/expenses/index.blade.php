@extends('layout.company')

@section('content')
    <!-- /.row -->
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h6 class="mb-0 text-uppercase ">{{ __('routes.Expenses') }}</h6>
                        <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal"
                            data-bs-target="#SearchModal">
                            <input class="form-control px-5" disabled type="search" placeholder="Search">
                            <span
                                class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i
                                    class='bx bx-search'></i></span>
                        </div>





                        <div class="d-flex ustify-content-between align-items-center" width='200'>
                            @if (Auth::guard('employee')->user()->can('create-role'))
                                <a class=" btn btn-primary float-right" href="{{ route('company.expenses.expenses_create') }}">{{ __('routes.Add') }}</a>
                            @endif
                                
                        </div>

                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ __('routes.Date') }}</th>
                                        <th>{{ __('routes.Account Name') }}</th>
                                        <th>{{ __('routes.Description') }}</th>
                                        <th>{{ __('routes.Amount') }}</th>
                                        <th>{{ __('routes.Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($expenses as $expense)
                                        <tr>
                                            <td>{{ $expense->date }}</td>
                                            <td>{{ $expense->account->account_name }}</td>
                                            <td>{{ $expense->desc }}</td>
                                            <td>{{ $expense->amount }}</td>
                                            <td class="d-flex ">
                                                <div class="mx-2">
                                                    @if (Auth::guard('employee')->user()->can('edit-role'))
                                                        <a class="btn btn-warning px-4" href="{{ route('company.expenses.expenses_edit', $expense->id) }}">{{ __('routes.Edit') }}</a>
                                                    @endif
                                                   
                                                </div>
                                                <div class="">
                                                    @if (Auth::guard('employee')->user()->can('delete-role'))
                                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                                        <form method="post" class="delete-form"
                                                            data-route="{{ route('company.expenses.expenses_destroy', $expense->id) }}">
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger px-4 ">{{ __('routes.Delete') }}</button>
                                                        </form>
                                                    @endif
                                                    
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
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
                                    title: "{{ __('routes.Deleted!') }}",
            text: "{{ __('routes.Has been Successfully deleted.') }}",
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
