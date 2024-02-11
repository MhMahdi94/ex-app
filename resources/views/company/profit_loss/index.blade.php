@extends('layout.company')

@section('content')
    <!-- /.row -->
    <div class="page-content">
        <div class="row">
            <div class="col-12">


                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 text-uppercase ">{{ __('routes.Profit and Loss') }}</h6>

                        <a class=" btn btn-dark float-right" href="{{ route('company.profit-loss.report_pdf') }}"
                            target="_Blank">{{ __('routes.Print') }}</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ __('routes.Account No') }}</th>
                                        <th>{{ __('routes.Account Name') }}</th>
                                        <th>{{ __('routes.Revenue') }}</th>
                                        <th>{{ __('routes.Expenses') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($revenues as $item)
                                    <tr>
                                        <td>{{ $item->account->account_no }}</td>
                                        <td>{{ $item->account->account_name }}</td>
                                        <td>{{ $item->total_revenue }}</td>
                                        <td>0</td>
                                    </tr>
                                @endforeach
                                    @foreach ($expenses as $item)
                                        <tr>
                                            <td>{{ $item->account->account_no }}</td>
                                            <td>{{ $item->account->account_name }}</td>
                                            <td>0</td>
                                            <td>{{ $item->total_expenses }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>

                    <div class="card-footer row">
                        <div class="col">
                            {{ __('routes.Revenue') }}: {{ $total_revenues }}
                        </div>
                        <div class="col">
                            {{ __('routes.Expenses') }}: {{ $total_expenses }}
                        </div>
                        <div class="col">
                            {{ __('routes.Balance') }}: {{ $total_revenues - $total_expenses}}
                        </div>
                    </div>
                </div>

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
