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

                        <h6 class="mb-0 text-uppercase ">{{ __('routes.Attendence Sheet') }}</h6>
                        {{--   --}}





                        {{-- <div class="d-flex ustify-content-between align-items-center" width='200'>
                            <a class=" btn btn-primary float-right" href="{{ route('company.roles.roles_create') }}">Print Sheet</a>
                        </div> --}}

                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('company.attendence.attendence_list') }}" class='needs-validation'
                            novalidate>
                            @csrf
                            <div class="card-body row g-2">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="employee_id">{{ __('routes.Employee') }}</label>
                                        <select class="form-select" {{-- id="multiple-select-field" --}}
                                             id="employee_id" name="employee_id"
                                            required>
                                            
                                           
                                                @foreach ($employees as $emp)
                                                    <option value="{{ $emp->id }}" >{{ $emp->name }}</option>
                                                @endforeach
                                            
                                           
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="from">{{ __('routes.From') }}</label>
                                        <input type="date" name="from" class="form-control" id="from" value="{{ $from??'' }}"
                                            placeholder="From" />
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="to">{{ __('routes.To') }}</label>
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
                                    @if (Auth::guard('employee')->user()->can('search-attendence'))
                                        <button type="submit" class="btn btn-secondary">{{ __('routes.Search') }}</button>
                                    @endif
                                    
                                </div>
                        </form>
                    </div>
                </div>

                
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 text-uppercase ">{{ $employee->name ?? ''}}</h6>
                        <form method="POST" action="{{ route('company.attendence.attendence_pdf') }}">
                            @csrf
                            <input type="hidden" name="employee_id" value="{{ $employee->id ?? '' }}"/>
                            <input type="hidden" name="from" value="{{ $from ?? '' }}"/>
                            <input type="hidden" name="to" value="{{ $to ?? '' }}"/>
                            @if (Auth::guard('employee')->user()->can('print-attendence'))
                                <button type="submit" class=" btn btn-dark float-right" >{{ __('routes.Print') }}</button>
                                        
                            @endif
                        </form>
                        {{-- <a class=" btn btn-dark float-right" href="{{ route('company.attendence.attendence_pdf') }}">Print</a> --}}
                    </div>
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ __('routes.Date') }}</th>

                                        <th>{{ __('routes.Check in') }}</th>
                                        <th>{{ __('routes.Check out') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($list as $item)
                                        <tr>
                                            <td>{{ $item->date }}</td>
                                            <td>{{ $item->check_in }}</td>
                                            <td>{{ $item->check_out }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                   
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
