@extends('layout.admin')
@section('title')
    Owners
@endsection
@section('page_name')
    Owners Page
@endsection
@section('active_link')
    <a href="#">Owners</a>
@endsection
@section('active_content')
    Owners Page
@endsection
@section('content')
    <!-- /.row -->
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 text-uppercase ">{{ __('routes.Owners List') }}</h3>






                        <div class="d-flex ustify-content-between align-items-center" width='200'>
                            @if (Auth::guard('admin')->user()->can('create-company-owner'))
                                <a class=" btn btn-primary float-right"
                                    href="{{ route('admin.owners.owners_create') }}">{{ __('routes.Add Owner') }}</a>
                            @endif

                        </div>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <form method="POST" action="{{ route('admin.owners.owners_search') }}" class='needs-validation'
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
                    <div class="card-body table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('routes.Name') }}</th>
                                    <th>{{ __('routes.Company') }}</th>
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
                                        <td>{{ $item->company->name ?? '' }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->mobile_no }}</td>
                                        <td><span
                                                class="badge {{ $item->status ? 'bg-success' : 'bg-danger' }} ">{{ $item->status ? __('routes.Active') : __('routes.Not Active') }}</span>
                                        </td>
                                        <td class="d-flex  ">
                                            <div class="">
                                                @if (Auth::guard('admin')->user()->can('create-company-owner'))
                                                    <a class="mr-2 btn btn-warning"
                                                        href="{{ route('admin.owners.owners_edit', $item->id) }}">{{ __('routes.Edit') }}</a>
                                                @endif

                                            </div>
                                            <div class="mx-2">
                                                @if (Auth::guard('admin')->user()->can('create-company-owner'))
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                                    <form method="post" class="delete-form"
                                                        data-route="{{ route('admin.owners.owners_destroy', $item->id) }}">
                                                        @method('delete')
                                                        <button type="submit"
                                                            class="btn btn-danger  ">{{ __('routes.Delete') }}</button>
                                                    </form>
                                                @endif

                                            </div>

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
                                    location.reload;
                                }, 3000);

                            }
                        });

                    }
                });

            })
        });
    </script>
@endsection
