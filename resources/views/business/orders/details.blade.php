@extends('layout.business')

@section('content')
    <!-- /.row -->
    <div class="page-content">

        <div class=" card">

            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="mb-0 text-uppercase ">{{ __('routes.Orders Details') }} - (#{{ $request->id }})</h6>
                <div class="d-flex ustify-content-between align-items-center" width='200'>
                    {{ $request->client->name }}
                </div>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <tr>
                                <th>{{ __('routes.Product') }}</th>
                                <th>{{ __('routes.Price') }}</th>
                                <th>{{ __('routes.Quantity') }}</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contents as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->product->sale_price }}</td>
                                    <td>{{ $item->quantity }}</td>


                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <div class="">
                        {{ __('routes.Total') }} : {{ $request->total_order }}
                    </div>
                    <div class="">
                        <a class="mr-2 btn btn-dark"
                            href="{{ route('business.orders.orders_pdf', $request->id) }}">{{ __('routes.Print') }}</a>
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
