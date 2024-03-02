@extends('layout.pdf')

@section('content')
    <!-- /.row -->
    <div class="page-content">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="">
                        <div class="d-flex gap-3">
                            <div class="">
                                <img src="{{ asset('assets/images/thrs.jpg') }}" width="80" height="80" alt="">
                            </div>
                            <div class="row">
                                <span class="fs-6 fw-bold">{{ Auth::guard('employee')->user()->company->name }}</span>
                                <span
                                    class="text-secondary fs-6 fw-normal">{{ Auth::guard('employee')->user()->company->email }}</span>
                                <label class="text-secondary  fw-normal"
                                    style="font-size: 12px">{{ Auth::guard('employee')->user()->mobile_no }}</label>
                            </div>
                        </div>

                    </div>
                    <div class="">
                        <h6>
                            {{ __('routes.Payroll Sheet') }} 
                        </h6>
                        <h6>{{ __('routes.Date') }}: {{ $date}}</h6>
                    </div>

                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="">

                            <!-- /.card-header -->
                            <div class="card-body table-responsive ">
                                <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ __('routes.Name') }}</th>
                                            <th>{{ __('routes.Total Days') }}</th>
                                            <th>{{ __('routes.Working') }}</th>
                                            <th>{{ __('routes.Absent') }}</th>
                                            <th>{{ __('routes.Salary') }}</th>
                                            <th>{{ __('routes.Current Salary') }}</th>
                                            {{-- <th>Actions</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
    
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ $employee->name }}</td>
                                                <td>{{ $diff }}</td>
                                                <td>{{ $employee->check_in }}</td>
                                                <td>{{ $diff-$employee->check_in }}</td>
                                                <td>{{$employee->details->salary??0 }}</td>
                                                <td>{{$employee->current_salary }}</td>
                                                {{-- <td class="d-flex ">
                                                    <div class="mx-2">
                                                        <a class="btn btn-primary px-4"
                                                            href="{{ route('company.roles.roles_edit', $employee->id) }}">Edit</a>
                                                    </div>
                                                    <div class="">
                                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                                        <form method="post" class="delete-form"
                                                            data-route="{{ route('company.roles.roles_destroy', $employee->id) }}">
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger px-4 ">Delete</button>
                                                        </form>
                                                    </div>
    
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
    
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                
            </div>

            
        </div>
    </div>
@endsection
