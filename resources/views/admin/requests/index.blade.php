@extends('layout.admin')
@section('title')
    Admins
@endsection
@section('page_name')
    Requests Page
@endsection
@section('active_link')
    <a href="#">Admins</a>
@endsection
@section('active_content')
    Requests Page
@endsection
@section('content')
    <!-- /.row -->
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 text-uppercase">{{ __('routes.Requests List') }}</h6>
                       
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('routes.Name') }}</th>
                                    <th>{{ __('routes.Owner') }}</th>
                                    <th>{{ __('routes.Address') }}</th>
                                    <th>{{ __('routes.Mobile No') }}</th>
                                    <th>{{ __('routes.Email') }}</th>
                                    <th>{{ __('routes.Employees') }}</th>
                                    <th>{{ __('routes.Departments') }}</th>
                                    <th>{{ __('routes.Status') }}</th>
                                    <th>{{ __('routes.Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->owner }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->mobileNo }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->noOfEmployee }}</td>
                                        <td>{{ $item->noOfDepts }}</td>
                                        <td><span
                                                class="badge {{ $item->status ? 'bg-success' : 'bg-warning' }} ">{{ $item->status ? __('routes.Done') : __('routes.pending') }}</span>
                                        </td>
                                        <td>
                                            <div class="mx-2">
                                                @if ($item->status == '0')
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                                    <form method="post" class="update-form"
                                                        data-route="{{ route('admin.requests.requests_update', $item->id) }}">
                                                        @method('delete')
                                                        <button type="submit"
                                                            class="btn btn-dark px-4 ">{{ __('routes.Complete') }}</button>
                                                    </form>
                                            </div>
                                @endif
                                {{-- <a class="mr-2 btn btn-info" href="{{ route('admin.requests.requests_update',$item->id ) }}" id="update_request">{{ __('routes.Complete') }}</a>
                                <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

                                </td>
                                </tr>
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

            $('.update-form').on('submit', function(e) {
                e.preventDefault();
                console.log($(this).data('route'));
                Swal.fire({
                    title: "Are you sure?",
                    // text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, complete it!"
                }).then((result) => {

                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'put',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: $(this).data('route'),
                            data: {
                                '_method': 'put'
                            },
                            success: function(response, textStatus, xhr) {
                                Swal.fire({
                                    title: "updated!",
                                    text: "Has been Successfully updated.",
                                    icon: "success"
                                }).then((data) => {
                                    // setTimeout(function() {
                                    //your code to be executed after 1 second
                                    location.reload();
                                    //}, 3000);
                                });


                            }
                        });

                    }
                });

            })
        });
    </script>
@endsection
