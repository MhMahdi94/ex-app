@extends('layout.company')
{{-- @section('title')
    Company
@endsection
@section('page_name')
    Company Page
@endsection
@section('active_link')
    <a href="#">Company</a>
@endsection
@section('active_content')
    Company Page
@endsection --}}
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h6 class="mb-0 text-uppercase ">{{ __('routes.Currency') }}</h6>

                        <div class="d-flex ustify-content-between align-items-center" width='200'>

                            <a class=" btn btn-primary float-right"
                                href="{{ route('company.settings.settings_currnecy_create') }}">{{ __('routes.Add Currency') }}</a>


                        </div>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ __('routes.Name') }}</th>
                                        <th>{{ __('routes.Currency Code') }}</th>
                                        <th>{{ __('routes.Exchange Rate') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($currencies as $currency)
                                        <tr>
                                            <td>{{ $currency->name }}</td>
                                            <td>{{ $currency->code }}</td>
                                            <td>{{ $currency->exchange_rate }}</td>
                                            <td class="d-flex ">
                                                <div class="mx-2">
                                                    @if (Auth::guard('employee')->user()->can('edit-role'))
                                                        <a class="btn btn-warning px-4"
                                                            href="{{ route('company.settings.settings_currnecy_edit', $currency->id) }}">{{ __('routes.Edit') }}</a>
                                                    @endif

                                                </div>
                                                <div class="">
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                                    <form method="post" class="delete-form"
                                                        data-route="{{ route('company.settings.settings_currnecy_delete', $currency->id) }}">
                                                        @method('delete')
                                                        <button type="submit"
                                                            class="btn btn-danger px-4 ">{{ __('routes.Delete') }}</button>
                                                    </form>


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
                    cancelButtonText: "{{ __('routes.Cancel') }}",
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
