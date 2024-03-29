@extends('layout.company')

@section('content')
    <!-- /.row -->
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 text-uppercase ">{{ __('routes.EMPLOYEES LIST') }}</h6>
                        

                        <div class="d-flex justify-content-between align-items-center" width='200'>

                            {{-- @if (Auth::guard('employee')->user()->can('create-employee') &&
                                    count($data) < Auth::guard('employee')->user()->company->noOfEmployee) --}}
                                <a class=" btn btn-success float-right"
                                    href="{{ route('company.employees.employees_create') }}">{{ __('routes.Add Employee') }}</a>
                            {{-- @endif --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('company.employees.employees_search') }}" class='needs-validation'
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
                                        <th>{{ __('routes.Salary') }}</th>
                                        <th>{{ __('routes.Status') }}</th>
                                        <th>{{ __('routes.Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td class="d-flex">
                                                <img class="rounded-circle p-0 mx-2 border" src="{{URL::asset('/uploads/img/employees/'.$item->photo)}}" width="50" height="50" alt="Contact Person">
                                                <div class="">
                                                    {{ $item->name }} <br /> {{ $item->employeeDetails->jobTitle??'' }}
                                                </div>
                                            </td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->mobile_no }}</td>
                                            <td>{{ $item->employeeDetails->salary??0 + $item->total_allowences??0 }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $item->status ? 'bg-success' : 'bg-danger' }} ">{{ $item->status ? __('routes.Active') : __('routes.Not Active') }}</span>
                                            </td>
                                            <td class="d-flex gap-2 ">
                                                <div class=" ">
                                                    @if (Auth::guard('employee')->user()->can('details-employee'))
                                                        <a class="btn btn-warning "
                                                            href="{{ route('company.employees.employees_details', $item->id) }}">{{ __('routes.Details') }}</a>
                                                    @endif


                                                </div>
                                                <div class="">
                                                    @if (Auth::guard('employee')->user()->can('edit-employee'))
                                                        <a class="btn btn-primary "
                                                            href="{{ route('company.employees.employees_edit', $item->id) }}">{{ __('routes.Edit') }}</a>
                                                    @endif


                                                </div>
                                                <div class="">
                                                    @if (Auth::guard('employee')->user()->can('delete-employee'))
                                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                                        <form method="post" class="delete-form"
                                                            data-route="{{ route('company.employees.employees_destroy', $item->id) }}">
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-danger  ">{{ __('routes.Delete') }}</button>
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
@endsection
