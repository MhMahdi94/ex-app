@extends('layout.admin')
{{-- @section('title')
Admins
@endsection
@section('page_name')
Admins Page
@endsection
@section('active_link')
<a href="#">Admins</a>
@endsection
@section('active_content')
Admins Page
@endsection --}}
@section('content')
    <!-- /.row -->
    <div class="page-content">
        <div class="card">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">

                <h6 class="mb-0 text-uppercase ">{{ __('routes.Admins List') }}</h6>
                {{-- {{ dd($user->can('create-admin')) }} --}}
                <div class="d-flex ustify-content-between align-items-center" width='200'>
                    @if ($user->can('create-admin'))
                        <a class=" btn btn-primary float-right"
                            href="{{ route('admin.admins.admins_create') }}">{{ __('routes.Add Admin') }}</a>
                    @endif

                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.admins.admins_search') }}" class='needs-validation'
                    novalidate>
                    @csrf
                    <div class="card-body row g-2">
                        <div class="form-group col-md-12 ">
                            <label for="query" class="mb-2">{{ __('routes.Search For') }}</label>
                            <input type="text" name="query" class="form-control" id="query"  required placeholder="{{__('routes.Mobile no or email')  }}">
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            {{-- @if (Auth::guard('employee')->user()->can('search-attendence')) --}}
                                <button type="submit" class="btn btn-secondary">{{ __('routes.Search') }}</button>
                            {{-- @endif --}}
                            
                        </div>
                </form>
            </div>
            <hr class="mb-2"/>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('routes.Name') }}</th>
                                <th>{{ __('routes.Email') }}</th>
                                <th>{{ __('routes.Mobile No') }}</th>
                                <th>{{ __('routes.Status') }}</th>
                                <th>{{ __('routes.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->mobile_no }}</td>
                                    <td><span
                                            class="badge {{ $item->status ? 'bg-success' : 'bg-danger' }} ">{{ $item->status ? __('routes.Active') : __('routes.Not Active') }}</span>
                                    </td>
                                    <td class="d-flex  ">
                                        @if ($user->can('edit-admin'))
                                            <div class=" ">
                                                <a class="btn btn-warning px-4"
                                                    href="{{ route('admin.admins.admins_edit', $item->id) }}">{{ __('routes.Edit') }}</a>
                                            </div>
                                        @endif
                                        @if ($user->can('delete-admin'))
                                          <div class="mx-2">
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <form method="post" class="delete-form"
                                                data-route="{{ route('admin.admins.admins_destroy', $item->id) }}">
                                                @method('delete')
                                                <button type="submit"
                                                    class="btn btn-danger px-4 ">{{ __('routes.Delete') }}</button>
                                            </form>
                                          </div>
                                        @endif
                                        

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
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

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
