@extends('layout.company')
@section('title')
Chart of Account
@endsection
@section('page_name')
Chart of Account Page
@endsection
@section('active_link')
<a href="#">Chart of Account</a>
@endsection
@section('active_content')
Chart of Account Page
@endsection
@section('content')

    <div class="page-content">
       
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex justify-content-between ">
                  {{-- <h3 class="card-title">Chart of account</h3> --}}
                  
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link " href="{{ route('company.coa.coa_index') }}" >{{__('routes.All')}}</a></li>
                    <li class="nav-item"><a class="nav-link " href="{{ route('company.coa.coa_assets') }}" >{{__('routes.Assets')}}</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('company.coa.coa_liabilities') }}" >{{__('routes.Liabilities')}}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('company.coa.coa_equity') }}" >{{__('routes.Equity')}}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('company.coa.coa_expenses') }}" >{{__('routes.Expenses')}}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('company.coa.coa_revenue') }}" >{{__('routes.Revenue')}}</a></li>
                   </ul>
                 <div class="card-tools d-flex gap-2">
                  @if (Auth::guard('employee')->user()->can('add-account'))
                    <a class="mr-2 btn btn-info" href="{{ route('company.coa.coa_create') }}">{{ __('routes.Add Account') }}</a>
                  @endif
                  @if (Auth::guard('employee')->user()->can('export-accounts'))
                    <a class="mr-2 btn btn-dark" href="{{ route('company.coa.coa_pdf') }}">{{ __('routes.Export') }}</a>  
                  @endif
                </div> 
            </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>{{ __('routes.Name') }}</th>
                        <th>{{ __('routes.Account No') }}</th>
                        <th>{{ __('routes.Total Debit') }}</th>
                        <th>{{ __('routes.Total Credit') }}</th>
                        <th>{{ __('routes.Balance') }}</th>
                        {{-- <th>Actions</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                              <td>{{ $item->account_name }}</td>
                              <td>{{ $item->account_no}}</td>
                              <td>{{ $item->account_debit}}</td>
                                <td>{{ $item->account_credit}}</td>
                                <td>{{ $item->account_balance}}</td>
                                <td class="row">
                                    {{-- <a class="mr-2 btn btn-info" href="{{ route('company.department.department_edit',$item->id ) }}">Edit</a>
                                    <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
                                    {{-- <input type="hidden" id="employee_id" value="{{ $item->id }}"> --}}
                                    {{-- <a class="mr-2 btn btn-danger" data-toggle="modal" data-target="#modal-danger" id='{{ $item->id }}'
                                    data-route="{{ route('company.employees.employees_destroy', $item->id) }}"
                                    data-url="{{ route('company.employees.employees_destroy', $item->id) }}" >Delete</a> --}}
                                    {{-- <form method="post" class="delete-form" data-route="{{route('company.department.department_destroy', $item->id) }}">
                                      @method('delete')
                                      <button type="submit" class="btn btn-danger  ">Delete</button>
                                    </form> --}}
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
    
@endsection