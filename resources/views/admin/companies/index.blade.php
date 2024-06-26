@extends('layout.admin')
{{-- @section('title')
Companies
@endsection
@section('page_name')
Companies Page
@endsection
@section('active_link')
<a href="#">Companies</a>
@endsection
@section('active_content')
Companies Page
@endsection --}}
@section('content')
    <!-- /.row -->
    <div class="page-content">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">

                <h6 class="mb-0 text-uppercase ">{{ __('routes.Companies List') }}</h6>

                <div class="d-flex ustify-content-between align-items-center" width='200'>
                    @if (Auth::guard('admin')->user()->can('create-company'))
                        <a class=" btn btn-primary float-right"
                            href="{{ route('admin.companies.companies_create') }}">{{ __('routes.Add Company') }}</a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.companies.companies_search') }}" class='needs-validation'
                    novalidate>
                    @csrf
                    <div class="card-body row g-2">
                        <div class="form-group col-md-12 ">
                            <label for="query" class="mb-2">{{ __('routes.Search For') }}</label>
                            <input type="text" name="query" class="form-control" id="query" required
                                placeholder="{{ __('routes.Email') }}">
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            {{-- @if (Auth::guard('employee')->user()->can('search-attendence')) --}}
                            <button type="submit" class="btn btn-secondary">{{ __('routes.Search') }}</button>
                            {{-- @endif --}}

                        </div>
                </form>
            </div>
            <hr class="mb-2" />
            <div class="card-body">

                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('routes.Name') }}</th>
                                <th>{{ __('routes.Description') }}</th>

                                <th>{{ __('routes.Email') }}</th>
                                <th>{{ __('routes.Departments') }}</th>
                                <th>{{ __('routes.Employees') }}</th>
                                <th>{{ __('routes.Subscription Start') }}</th>
                                <th>{{ __('routes.Subscription End') }}</th>
                                <th>{{ __('routes.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->email }}</td>
                                    {{-- <td>{{ $item->description }}</td> --}}
                                    <td>{{ $item->noOfDept }}</td>
                                    <td>{{ $item->noOfEmployee }}</td>
                                    <td>{{ $item->subscriptionStart }}</td>
                                    <td>{{ $item->subscriptionEnd }}</td>
                                    {{-- <td><span class="badge {{ $item->status?'bg-success':'bg-danger' }} ">{{ $item->status?'Active':'Not Active' }}</span></td> --}}
                                    <td class="d-flex gap-2 ">
                                        <div class="col-8 mx-1">
                                            @if (Auth::guard('admin')->user()->can('edit-company'))
                                                <a class="btn btn-warning px-4"
                                                    href="{{ route('admin.companies.companies_edit', $item->id) }}">{{ __('routes.Edit') }}</a>
                                            @endif
                                            @if (Auth::guard('admin')->user()->can('edit-company'))
                                                
                                                    <a class="btn btn-info px-4"
                                                        href="{{ route('admin.companies.companies_renew', $item->id) }}">{{ __('routes.Renew Contract') }}</a>
                                                
                                            @endif
                                        </div>
                                        <div class="col-4">
                                            @if (Auth::guard('admin')->user()->can('delete-company'))
                                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                                <form method="post" class="delete-form"
                                                    data-route="{{ route('admin.companies.companies_destroy', $item->id) }}">
                                                    @method('delete')
                                                    <button type="submit"
                                                        class="btn btn-danger px-4 ">{{ __('routes.Delete') }}</button>
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
